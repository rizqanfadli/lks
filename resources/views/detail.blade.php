<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Game</title>
    <link rel="icon" type="image/x-icon" href="../storage/logo.png">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
      img {
         border-radius: 8px;
        }
    </style>
  </head>
  <body> 
    <div id="app">
      <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
          <div class="container">
              <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
                  <img src="{{ asset('storage/logo.png') }}" alt="Logo" width="30" height="30" class="rounded">
                  <span class="fw-bold text-primary">{{ config('app.name', 'Playnix') }}</span>
              </a>
      
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                  <span class="navbar-toggler-icon"></span>
              </button>
      
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <!-- Left Side -->
                  <ul class="navbar-nav me-auto"></ul>
      
                  <!-- Right Side -->
                  <ul class="navbar-nav ms-auto d-flex align-items-center gap-2">
                      <li class="nav-item">
                          <a class="nav-link fw-semibold" href="/">Beranda</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link fw-semibold" href="/contact">Kontak</a>
                      </li>
      
                      @auth
                          <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle fw-semibold" href="#" role="button"
                                  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->name }}
                              </a>
      
                              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                  <li><a class="dropdown-item" href="/admin/games">🎮 Upload Game</a></li>
                                  <li><a class="dropdown-item" href="/admin">🛠 Admin Panel</a></li>
                                  <li><hr class="dropdown-divider"></li>
                                  <li>
                                      <a class="dropdown-item" href="{{ route('logout') }}"
                                          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                          🚪 Logout
                                      </a>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                          @csrf
                                      </form>
                                  </li>
                              </ul>
                          </li>
                      @else
                          @if (Route::has('login'))
                              <li class="nav-item">
                                  <a class="nav-link fw-semibold" href="{{ route('login') }}">Login</a>
                              </li>
                          @endif
                          @if (Route::has('register'))
                              <li class="nav-item">
                                  <a class="nav-link fw-semibold" href="{{ route('register') }}">Register</a>
                              </li>
                          @endif
                      @endauth
                  </ul>
              </div>
          </div>
      </nav>
  </div>
    <main>
      <div class="hero py-5 bg-light">
         <div class="container text-center"> 
            <h2 class="mb-1">{{ $games->title }}</h2> 
            <div class="text-muted">{{ $games->description }}</div>
            {{-- <div class="card">Di unggah oleh {{ $games->created_by }}</div> --}}
            <a href="" class="btn btn-primary">Di unggah oleh {{ $games->created_by }}</a>
         </div>
      </div>

      <div class="py-5">
         <div class="container"> 

            <div class="row justify-content-center ">
               <div class="col-lg-5 col-md-6"> 
                                
                <div class="row">
                  <div class="col">
                    <div class="card mb-3">
                      <div class="card-body">
                          <h5>Top 10 Leaderboard</h5>
                          <ol>
                            <li>Player5 (3004)</li>
                            <li>Player2 (2993)</li>
                            <li>Player3 (2000)</li>
                            <li>Player4 (1195)</li>
                            <li><b>Player1 (1190)</b></li>
                            <li>Player6 (1093)</li>
                            <li>Player7 (1055)</li>
                            <li>Player8 (1044)</li>
                            <li>Player9 (1005)</li>
                            <li>Player10 (992)</li>
                          </ol>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <img src="{{ Storage::url($games->img) }}" alt="Demo Game 1 Logo" style="width: 100%">
                   <a href="{{ route('games.play', $games->slug) }}" class="btn btn-primary  w-100 mb-2 mt-2">Mainkan</a>
                   <a href="{{ Storage::url($games->file) }}" class="btn btn-primary w-100 mb-2 mt-2">Download Game</a>
                  </div>
                </div>               
                <a href="/" class="btn btn-danger w-100">Back</a>
               </div>
             </div>  
         </div>
      </div>
    </main>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/popper.js"></script>
  </body>
</html>