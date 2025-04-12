<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Game Browser</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
      img {
         border-radius: 10px;
        }
    </style>
  </head>
  <body> 

    <main>
      <div class="hero py-5 bg-light">
         <div class="container text-center"> 
            <h2 class="mb-1">{{ $games->title }}</h2> 
            
            {{-- <a href="profile.html" class="btn btn-success">{{ $users->name }}</a> --}}
            <div class="text-muted">{{ $games->description }}</div>
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
                   <a href="{{ route('games.play', $games->slug) }}" class="btn btn-primary">Mainkan</a>
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