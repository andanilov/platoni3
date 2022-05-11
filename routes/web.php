<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\QuestsController;
use App\Http\Controllers\QuestController;
use App\Http\Controllers\MistakesController;
use App\Http\Controllers\HistoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return Inertia::render('-Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });


// --- Users

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/Profile', function () {
        return Inertia::render('Profile', [
            'user' => Auth::user()
        ]);
    })->name('Profile');

    Route::get('/Mistakes', [MistakesController::class, 'index'])->name('Mistakes');

    Route::post('/get/mistakes', [MistakesController::class, 'getMistakes'])->name('getMistakes');
    Route::post('/delete/mistakes', [MistakesController::class, 'deleteMistakes'])->name('deleteMistakes');

});





// --- Guests

Route::get('/',             [IndexController::class, 'index']);
Route::get('/quests',       [QuestsController::class, 'index']);
Route::get('/history',      [HistoryController::class, 'index']);
Route::get('/login',        [IndexController::class, 'index'])->name('login');
Route::get('/quest/{id}',   [QuestController::class, 'index'])->where(['id' => '[0-9]+'])->name('quest');


// --- XHR

Route::post('/add/user_quest', [QuestController::class, 'addUserQuest'])->name('addUserQuest');
Route::get('/get/map', [QuestsController::class, 'getMap'])->name('getMap');

