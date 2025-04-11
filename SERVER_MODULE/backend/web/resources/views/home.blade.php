{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Game Browser</title>
  <link rel="icon" type="image/x-icon" href="../storage/logo.png">

</head>
<body>  
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
                        {{-- <p class="card-text">Versi: {{ $game->versi }}</p> --}}
                        <a href="{{ Storage::url($game->file) }}" class="btn btn-primary">Mainkan</a>
                        <a href="/detail" class="btn btn-primary">Detail Game</a>
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