<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Mistakes;
use Illuminate\Support\Facades\Auth;


class MistakesController extends Controller
{

    private $model;

    public function __construct()
    {
        $this->model = new Mistakes();
    }


    public function index()
    {
        return Inertia::render('Mistakes', [
            'mistakes'  => $this->getMistakes()
        ]);
    }


    public function getMistakes()
    {
        return $this->model->getMistakes( Auth::id() ) ;
    }


    public function deleteMistakes(Request $request)
    {
        $this->model->deleteMistakes( Auth::id(), $request->id_mistakes);
        return response()->json([]);
    }
}
