<?php

namespace App\Http\Controllers;

use ZipArchive;
use App\Models\Games;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    public function show($id)
    {
        $games = Games::paginate(10);
        $gamesCount = Games::count(); 
        return view('home', compact('games', 'gamesCount'));
    }

    public function play($slug)
    {
        $game = Games::where('slug', $slug)->firstOrFail();
        $zipPath = storage_path("app/public/" . $game->file);
        $unpackDir = storage_path("app/public/unpacked/{$slug}");
    
        if (!file_exists($unpackDir)) {
            mkdir($unpackDir, 0777, true); // buat folder

            $zip = new ZipArchive;
            if ($zip->open($zipPath) === TRUE) {
                $zip->extractTo($unpackDir);
                $zip->close();
            } else {
                return abort(500, 'Gagal mengekstrak file ZIP');
            }
        }
        
        $publicPath = Storage::url("unpacked/{$slug}/index.html");
        return redirect($publicPath);
    }
}
