<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
 
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Sign in</title>
 
</head>
<body>
    <header id = 'header'>
         <div class="navbar-fixed">
            <nav class="nav-wrapper blue">
                <div class="container">
                    <a href="/" class="brand-logo">5booster</a>
                    <a href="" class="sidenav-trigger" data-target="mobile-menu">
                        <i class="material-icons">menu</i>
                    </a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="Accueil">Accueil</a></li>
                        <li><a href="Contact">Contact</a></li>
                        <li><a href="Signin">Sign in </a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- Do not put in fixed navbar-->
        <ul class="sidenav" id="mobile-menu">
            <li><a href="Accueil">Accueil</a></li>
            <li><a href="Contact">Contact</a></li>
            <li><a href="Signin">Sign in</a></li>
        </ul>
    </header>

    <div class="container">
        <h2 class="center-align">Sign in</h2>
        <div class="row cen"> 
     
            <form class="col s12" action='/Signin' method="POST">
                <div class="row">
                    <div class="input-field col s12 m6 l6 xl6">
                        <input type="text" class="validate" name = "username" id="username">
                        <label for="username">username or email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6 l6 xl6">
                        <input type="password" class="validate" name = "password" id="password">
                        <label for="password">password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 l6 xl6">
                       <button class="btn waves-effect waves-light" type="submit">Sign in
                        <i class="material-icons right">send</i>
                      </button>
                    </div>
                </div>
            </form>
            <p class=""><a href="{{url('register')}}" class="">Still no account ? Register here</a></p>
        </div>
    </div>
    

    



    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
        });
    </script>
    
</body>
</html>