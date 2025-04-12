<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Game Browser</title>
        <link rel="icon" type="image/x-icon" href="../storage/logo.png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        @extends('layouts.app')
        @section('content')
        <div class="container">
            <h1 class="text-center mb-4">Daftar Game</h1>        
            <div class="row">
                @foreach ($games as $game)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img src="{{ $game->img ? Storage::url($game->img) : asset('storage/default.jpg') }}" class="card-img-top img-fluid" alt="{{ $game->slug }}">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $game->slug }}</h5>
                                <a href="{{ route('games.play', $game->slug) }}" class="btn btn-primary">Mainkan</a>
                                <a href="{{url('/detail/' . $game->id)}}" class="btn btn-primary">Detail Game</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
        <div class="d-flex content-justify-center">
            {{$games->links()}}
        </div>
        @endsection

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>
