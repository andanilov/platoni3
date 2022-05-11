<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Quests;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;


class HistoryController extends Controller
{

    public function index()
    {
        return Inertia::render('History', [
            'user' => Auth::user(),
        ]);
    }

}
