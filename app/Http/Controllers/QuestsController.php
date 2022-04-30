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

        $currLvl            = 0;
        $currPassed         = 0;
        $currCount          = 0;
        $limQstAfterPassed  = 1; // Levels limit after passed


        foreach($this->questsMap->getQuestsMap( Auth::id() ?? false ) as $quests) {

            // -- level chenged
            if( $currLvl != $quests->level ) {

                if( $limQstAfterPassed <= 0 )
                    break;

                if( $currPassed < $currCount )
                    $limQstAfterPassed--;

                $currPassed = 0; // Clear level all passed quests
                $currCount  = 0; // Clear level all quests
            }

            // - Increase level quest passed number
            $currPassed += $quests->passedNum ?? 0;

            // - Increase level quest all number
            $currCount += $quests->count;

            // - Set current level
            $currLvl = $quests->level;

            $output[$quests->level][] = [
                'title'         => $quests->title,
                'questName'     => $quests->quest_name,
                'count'         => $quests->count,
                'firstId'       => $quests->firstId,
                'currentId'     => $quests->currentId   ?? $quests->firstId,
                'nextId'        => $quests->nextId      ?? $quests->firstId ?? false,
                'lastId'        => $quests->lastId,
                'passedNum'     => $quests->passedNum   ?? 0,
            ];

        }

        echo json_encode($output);
    }
}
