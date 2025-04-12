<?php

namespace App\Http\Controllers;

use App\Models\Games;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function show($id)
    {
        $games = Games::findOrFail($id);
        return view('detail', compact('games'));
    }
}
