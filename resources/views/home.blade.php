<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Game Browser</title>
  <link rel="icon" type="image/x-icon" href="../storage/logo.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<style>
  body {
    font-family: poppins !important;
  }
</style>
<body>  
@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="text-center mb-4">Daftar Game</h1>    
    <div class="card text-white bg-primary mb-2" style="max-width: fit-content; padding: 0 1rem; border-radius: 8px;">
        <div class="card-body py-2 px-3 text-start">
          <div>Total Game: {{ $gamesCount }}</div>
        </div>
    </div>    
    <div class="row">
        @foreach ($games as $game)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="{{ $game->img ? Storage::url($game->img) : asset('storage/default.jpg') }}" class="card-img-top img-fluid" alt="{{ $game->slug }}">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $game->slug }}</h5>
                        {{-- <p class="card-text">Versi: {{ $game->versi }}</p> --}}
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
</body>
</html>