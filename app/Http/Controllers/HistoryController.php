<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;


class HistoryController extends Controller
{

    private $model;

    public function __construct()
    {
        $this->model = new History();
    }


    public function index()
    {
        $this->getHistory();

        return Inertia::render('History', [
            'user' => Auth::user(),
            'history' => response()->json($this->getHistory())
        ]);
    }



    public function getHistory()
    {
        return $this->model->getHistory(Auth::user()->id);
    }

}
