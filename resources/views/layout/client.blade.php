<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>5booster</title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One&display=swap" rel="stylesheet">
    <script defer src="{{ asset('public/js/app.js') }}"></script>
</head>

  <body>
    <div class="container-fluid">
      <!-- Header -->
      <header class="container-fluid" id="header_connected">
          <!-- Bar de navigation -->
          <nav class="navbar navbar-expand-sm navbar-light bg-light mb-2">
              <a class="navbar-brand" href="{{url('/')}}">5Booster</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbar">
                  <ul class="navbar-nav ml-auto">
                      <li class="nav-item">
                          <a class="nav-link" href="{{url('/client_espace')}}">Mon Compte</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{url('/abonnement')}}">Mon abonnement</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{url('/client_espace')}}">
                              <svg class="user-icon" viewBox="0 0 20 20">
                                  <path d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"></path>
                              </svg>
                          </a>
                      </li>
                  </ul>
              </div>
          </nav>
          <!-- Bar de navigation -->
      </header>
      <!-- Header -->

      <div class="container-fluid" id="container-connected">
        <div class="row">
          @yield('content')
          <div id="app"></div>
        </div>
      </div>

      <!-- Footer -->

      <footer class="page-footer-connected font-small bg-light container-fluid">
          <div class="row d-flex justify-content-center">
            <div class="col-xs-12 col-sm-2 text-center text-wrap">
              <a class="footer-link" href="">A propos</a>
            </div>
            <div class="col-xs-12 col-sm-2 text-center text-wrap">
              <a class="footer-link" href="">Connexion</a>
            </div>
            <div class="col-xs-12 col-sm-2 text-center text-wrap">
              <a class="footer-link" href="">Mentions légales</a>
            </div>

            <!-- Break the line -->
            <div class="w-100"></div>

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© 2020 Copyright:
              <a>5booster</a>
            </div>
            <!-- Copyright -->
          </div>
      </footer>
      <!-- Footer -->
    </div>



  <!-- <script type="text/javascript" src="js/script.js"></script> -->
  </body>
</html>
