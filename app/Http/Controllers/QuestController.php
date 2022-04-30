<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\Quest;

interface QuestControllerI
{
    public function index ( Request $request );             // Output quest
    public function addUserQuest( Request $request );       // Add user passed quest by POST data

    public function generateTask( $params );                // Tasks generate params: min, max, count, count

    public function addition2 ($min, $max);                 // Handler


}


class QuestController extends Controller implements QuestControllerI
{

    private $model;
    private $questModel = [];



    public function __construct()
    {
        $this->model = new Quest();
    }




    // --- Quest output

    public function index ( Request $request )
    {

        // -- Check quest id
        if( !$request->id )
            return response([], 200);

        // -- get Map
        if( !( $this->getQuestMap = $this->model->getQuestMap($request->id) ) )
            return response([], 200);

// echo "<pre>";
// print_r($this->getQuestMap[0]);
// echo "</pre>";

        // -- get QuestTasks
        $questTasks = $this->generateTask( $this->getQuestMap[0] );


        // -- Output Quest object
        $questObj = "{
            idQuest:     {$request->id},
            idQuestNext: ". ($this->getQuestMap[0]->next_id ?? 0) .",
            time:        {$this->getQuestMap[0]->time},
            tasks:       [ ".implode(',', $questTasks)." ]
        }";
//($this->getQuestMap[0]->next_id ?? 0)

        return Inertia::render('Quest', [
            'user'  => Auth::user(),
            'quest' => $questObj,
        ]);
    }




    // -- Add user passed quest

    public function addUserQuest( Request $request )
    {
        return response()->json(['result' =>
            $this->model->addQuestUser([
                'id_user'       =>  Auth::id(),
                'id_quest_map'  =>  $request->id_quest_map,
                'answers_num'   =>  $request->answers_num,
                'mistakes_num'  =>  $request->mistakes_num,
                'quest_period'  =>  $request->quest_period,
                'mistakes'      =>  $request->mistakes,
                ])
        ]);
    }




    // -- Task Generator

    public function generateTask( $params )
    {

        if( !$params->quest_name || !method_exists($this,  $params->quest_name) )
            return [];

        $result = [];


        // - From random min to random max by step 3+5 -> 7+45
        $stepMax = ceil( ($params->max - $params->min) / $params->count );
        $stepMin = round( $stepMax / 2 );
        $currentMin = $currentMax = $params->min;


        // - Try to call Handler and get one task
        while( $params->count-- ) {

            $currentMax = ( $currentMax + $stepMax < $params->max )
                ? $currentMax + $stepMax
                : $params->max;

            $currentMin = ( $currentMin + $stepMin < $params->max / 3 )
                ? $currentMin + $stepMin
                : $currentMin;

            // echo "min={$currentMin} max={$currentMax} stepMin={$stepMin} stepMax={$stepMax}<br/>";

            try {

                // Attempts to get unique task
                $attempt = 10;

                // Get task
                do {

                    $res = call_user_func_array( [$this, $params->quest_name], ['min' => $currentMin, 'max' => $currentMax] );

                // Repeat, if task already exists
                } while( in_array($res, $result) && --$attempt > 0 );

                // Set task
                $result[] = $res;

            } catch ( Exception $e ) {
                return [];
            }
        }

        return $result;

    }


    // -- addition2

    public function addition2 ($min, $max)
    {
        return $this->generateSimpleTask($min, $max, 2, ['+']);
    }




    private function generateSimpleTask($min = 1, $max = 10, $count = 2, $operations = ['+'], $skip = false)
    {

        $taskArr    = [];

        do {

            $taskArr[] = rand( $min, $max );
            $taskArr[] = $operations [array_rand( $operations )];

        } while ( --$count > 0 );


        // - delete last operation
        array_pop($taskArr);


        // - get task string
        $taskStr = implode('', $taskArr);


        // - get task correct answer
        eval('$correct=('. $taskStr .');');


        // Set skip task
        if ($skip) {

            $replaceKey =  $this->evenRandom ( 0, count($taskArr) - 1 );
            $taskArr[$replaceKey] = '_';

            return $this->outputTaskAsObject ( implode('', $taskArr) . "=" . $correct, $correct);

        // Set ordinary task
        } else {
            return $this->outputTaskAsObject ($taskStr . '=_', $correct);
        }
    }




    // -- Output task by object format

    private function outputTaskAsObject ($task, $correct)
    {
        return "{ task : '".$task."', correct : '".$correct."' }";
    }




    // -- Even random number

    private function evenRandom ( $min, $max )
    {
        return ($num = rand($min, $max)) % 2 ? evenRandom ( $min, $max ) : $num;
    }

}