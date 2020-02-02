<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no"/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
{{--    <link rel="stylesheet" type="text/css" href="css/style.css">--}}
</head>

<body>
<header>
    <!-- Bar de navigation -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light" id="nav">
        <a class="navbar-brand" href="#">5Booster</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Notre Histoire</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Nous contacter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Inscription</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Bar de navigation -->
</header>
<!-- Contenu -->

<div class="container d-flex flex-column">
    <div class="row">
        <div class="col-sm">
        </div>
        <div class="col-sm">
            <form class="Inscription" method="post" action="">
                {{csrf_field()}}
                <div class="form-group" id="mail">
                    <input type="email" class="form-control" placeholder="Adresse mail" name="email"/>
                </div>
                <div class="form-group" id="password">
                    <input type="password" class="form-control" placeholder="Mot de passe" name="password"/>
                </div>
                <div class="form-group" id="phone">
                    <input type="tel" class="form-control" placeholder="Numéro de téléphone" name="telephone"/>
                </div>
                <div class="form-group" id="username">
                    <input type="text" class="form-control" placeholder="Nom d'utilisateur" name="username"/>
                </div>
                <div class="form-group" id="birthday">
                    <small id="dateHelp" class="form-text text-muted">Date de naissance</small>
                    <input type="date" class="form-control" placeholder="Date de naissance" name="birthday"/>
                </div>
                <div class="form-group" id="genre">
                    <fieldset>
                        <legend>Genre</legend>
                        <div>
                            <input type="radio" id="homme" name="contact" value="homme"/>
                            <label for="homme">Homme</label>
                            <input type="radio" id="femme" name="contact" value="femme"/>
                            <label for="homme">Femme</label>
                        </div>
                    </fieldset>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Inscription</button>
                </div>
            </form>
        </div>
        <div class="col-sm">
        </div>
    </div>
</div>

<!-- Contenu -->

<!-- Footer -->
<footer class="footer">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse flex-md-column">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">A propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mentions légales</a>
                </li>
            </ul>
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link" href="https://5booster.com/">©5Booster 2020</a>
                </li>
            </ul>
        </div>
    </nav>
</footer>
<!-- Footer -->

</body>
</html>