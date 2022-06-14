<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quests;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;


class QuestsController extends Controller
{

    private $questsMap;

    public function __construct()
    {
        $this->questsMap = new Quests();
    }



    public function index()
    {
        return Inertia::render('Quests', [
            'user' => Auth::user(),
        ]);
    }



    public function getMap()
    {
        $output = [];
        $progressMap = [];
        $limQstAfterPassed  = 1; // Levels limit after passed
        $currLvl            = 0;
        $currPassed         = 0;
        $currCount          = 0;



        // - Get progress for logged user
        if( ($progress = Auth::id() ? $this->questsMap->getUserQuestsProgress(Auth::id()) : false) )

        foreach ($progress as $prog)
            $progressMap[ $prog->level ][ $prog->quest_name ] = [
                'currentId' => $prog->currentId,
                'nextId'    => $prog->nextId ?? 0,
                'passedNum' => $prog->passedNum ?? 0
            ];


// echo "<pre>";
// print_r( $progressMap );
// echo "</pre>";

        // - Set quest map with user progress for front end
        foreach($this->questsMap->getQuestsMap() as $quests) {

            $currentProgress = $progressMap[ $quests->level ][ $quests->quest_name ] ?? [];
// echo "<pre>";
// print_r($currentProgress);
// echo "</pre>";
            // -- level changed
            if( $currLvl != $quests->level ) {

                if( $limQstAfterPassed <= 0 )
                    break;

                if( $currPassed < $currCount )
                    $limQstAfterPassed--;

                $currPassed = 0; // Clear level all passed quests
                $currCount  = 0; // Clear level all quests
            }

            // - Set current level
            $currLvl = $quests->level;

            // - Increase level quest passed number
            $currPassed += $currentProgress['passedNum'] ?? 0;

            // - Increase level quest all number
            $currCount += $quests->count;

// echo "1 -> " . array_key_exists('nextId', $currentProgress) . "\n";
// echo "2 -> " . $currentProgress['nextId'] . "\n";
// echo "3 -> " . $quests->lastId . "\n\n";

            // PreSet output rows
            $qCurrentId = $currentProgress['currentId'] ?? $quests->firstId;
            $qPassedNum = $currentProgress['passedNum'] ?? 0;
            $qNextId = ( array_key_exists('nextId', $currentProgress)
                        && $currentProgress['nextId'] > 0
                        && $currentProgress['nextId'] <= $quests->lastId )
                            ? $currentProgress['nextId']
                            : ($qCurrentId >= $quests->lastId
                                ? $quests->lastId
                                : $quests->firstId);

            // Get current Quest info
            $questInfo = $this->questsMap->getQuestLevelsInfoByMapId($qCurrentId);
            // $progressMap[$prog->level][$prog->quest_name] = $progressMap[$prog->level][$prog->quest_name] + [
            //     'questLevel' => $nextTaskInfo[0]->level,
            //     'questMin' => $nextTaskInfo[0]->min,
            //     'questMax' => $nextTaskInfo[0]->max,
            //     'questTime' => $nextTaskInfo[0]->time,
            //     'questCount' => $nextTaskInfo[0]->count,
            // ];


            $output[$quests->level][] = [
                'title'         => $quests->title,
                'questName'     => $quests->quest_name,
                'count'         => $quests->count,
                'firstId'       => $quests->firstId,
                'lastId'        => $quests->lastId,
                'currentId'     => $qCurrentId,
                'nextId'        => $qNextId,
                'passedNum'     => $qPassedNum,

                'questLevel' => $qCurrentId, //$questInfo[0]->level ?? '',
                'questMin'   => $questInfo[0]->min ?? '',
                'questMax'   => $questInfo[0]->max ?? '',
                'questTime'  => $questInfo[0]->time ?? '',
                'questCount' => $questInfo[0]->count ?? '',
            ];
        }

// echo "<pre>";
// print_r($output);
// echo "</pre>";

        echo json_encode($output);
    }
}
