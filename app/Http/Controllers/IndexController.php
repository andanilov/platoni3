<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\History;


class IndexController extends Controller
{

    private $historyModel;


    public function __construct()
    {
        $this->historyModel = new History();
    }


    public function index()
    {

        return Inertia::render('Index', [
            'user'      => Auth::user(),
            'users'     => +$this->historyModel->getUserCount()[0]->users,
            'quests'    => +$this->historyModel->getQuestsCount()[0]->quests,
            'levels'    => +$this->historyModel->getLevelsCount()[0]->maxLevel,
            'countTasks'=> +$this->historyModel->getTasksCount()[0]->countTasks,

            'userQuestsPassed'  => Auth::user() ? +$this->historyModel->getLevelsCount()[0]->maxLevel : 0,
            'countTasksUsers'   => Auth::user() ? +$this->historyModel->getTasksCount(Auth::user()->id)[0]->countTasksUsers : 0,
            'maxUserLevel'   => Auth::user() ? +$this->historyModel->getLevelsCount(Auth::user()->id)[0]->maxUserLevel : 0,

            // 'statistic' => $this->history->getStatistic()
        ]);
    }

}
