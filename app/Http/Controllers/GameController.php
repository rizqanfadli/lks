<?php

namespace App\Http\Controllers;

use App\Models\Games;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function show($id)
    {
        $games = Games::paginate(10);
        $gamesCount = Games::count(); 
        return view('home', compact('games', 'gamesCount'));
    }
}
