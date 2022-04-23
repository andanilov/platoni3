<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quests;


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

        foreach($this->questsMap->getQuestsMap() as $quests)

            $output[$quests->level][] = [
                'title'         => $quests->title,
                'questName'     => $quests->quest_name,
                'count'         => $quests->count,
                'currentId'     => $quests->currentId,
            ];

        echo json_encode($output);
    }
}
