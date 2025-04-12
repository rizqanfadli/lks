<?php

use App\Models\Games;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $games = Games::paginate(10);
    $gamesCount = Games::count(); 
    return view('home', compact('games', 'gamesCount'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/detail/{id}', function ($id) {
    $games = Games::findOrFail($id);
    return view('detail', compact('games'));
});
Route::get('/play/{slug}', [App\Http\Controllers\GameController::class, 'play'])->name('games.play');