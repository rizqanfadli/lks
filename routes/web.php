<?php

use App\Models\Games;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $games = Games::paginate(10);
    return view('welcome', compact('games'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/detail/{id}', function ($id) {
    $games = Games::findOrFail($id);
    return view('detail', compact('games'));
});
