<?php

namespace App\Http\Controllers;

use App\Models\Games;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count = Games::count();
        $games = Games::paginate(10);
        return view('home', compact('games'));
    }
    
}
