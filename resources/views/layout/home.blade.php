<!doctype html>
<html>
  <head>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <link rel="stylesheet" type="text/css" href="{{ asset('public/css/style.css') }}">
  </head>

  <body>
    <!-- Header-->
    <header>
        <!-- Navigation navbar -->
        <nav class="navbar navbar-expand-sm navbar-light bg-light mb-2" id="nav">
            <a class="navbar-brand" href="{{ url('/') }}">5Booster</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/history') }}">Notre Histoire<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Nous contacter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/register') }}">Inscription</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Navigation navbar -->
    </header>
    <!-- Header-->

    @yield('content')

    <div id="app">
    </div>

    <!-- Footer -->
    <footer class="page-footer font-small bg-light">
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

  </body>
</html>
