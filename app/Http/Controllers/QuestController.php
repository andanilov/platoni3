<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;


class QuestController extends Controller
{
    
    public function index()
    {
        return Inertia::render('Quest', [
            'user' => Auth::user(),
        ]);
    }

}
