<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quests;
use Illuminate\Support\Facades\Auth;


class QuestsController extends Controller
{

    private $questsMap;

    public function __construct()
    {
        $this->questsMap = new Quests();
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

        foreach( $progress as $prog)
            $progressMap[ $prog->level ][ $prog->quest_name ] = [
                'currentId' => $prog->currentId,
                'nextId'    => $prog->nextId ?? 0,
                'passedNum' => $prog->passedNum ?? 0
            ];


        // - Set quest map with user progress for front end
        foreach($this->questsMap->getQuestsMap() as $quests) {

            $currentProgress = $progressMap[ $quests->level ][ $quests->quest_name ] ?? [];

            // -- level chenged
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

            // PreSet output rows
            $qCurrentId = $currentProgress['currentId'] ?? $quests->firstId;
            $qPassedNum = $currentProgress['passedNum'] ?? 0;
            $qNextId = array_key_exists('nextId', $currentProgress) && $currentProgress['nextId'] > 0 && $currentProgress['nextId'] < $quests->lastId
                            ? $currentProgress['nextId']
                            : ($qCurrentId >= $quests->lastId
                                ? $quests->lastId
                                : $quests->firstId);

            $output[$quests->level][] = [
                'title'         => $quests->title,
                'questName'     => $quests->quest_name,
                'count'         => $quests->count,
                'firstId'       => $quests->firstId,
                'lastId'        => $quests->lastId,
                'currentId'     => $qCurrentId,
                'nextId'        => $qNextId,
                'passedNum'     => $qPassedNum,
            ];
        }

        echo json_encode($output);
    }
}
