<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <title>Contact 5booster</title>
 
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