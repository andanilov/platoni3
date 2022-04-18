<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestsMap;


class QuestsController extends Controller
{

    private $questMap;

    public function __construct() 
    {
        $this->questMap = new QuestsMap();
    }


    public function getMap()
    {
        $output = [];

        foreach($this->questMap->getQuestMap() as $quests)

            $output[$quests->level][] = [
                'title'         => $quests->title,
                'questName'    => $quests->quest_name,
                'count'         => $quests->count,
            ];

        echo json_encode($output);
    }
}
