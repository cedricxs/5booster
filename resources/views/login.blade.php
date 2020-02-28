@extends('layout.home')
@section('content')

    <!-- Content -->
    <div class="container d-flex flex-column">
        <div class="row">
            <div class="col-sm">
            </div>
            <div class="col-sm">
                <div class="card text-center" style="width: 25rem;">
                    <img src="https://5booster.com/img/run.jpg" class="card-img-top" alt="Image">
                </div>
            </div>
            <div class="col-sm">
                <form class="right" method="post" action="https://5booster.com/login">
                    <input type="hidden" name="_token" value="LAd6l5BdPY3aWyCrWYTBeMvCc04OQdFx8a3hIbiP">
                    <div class="form-group" id="username">
                        <input name="identifier" class="form-control" aria-describedby="emailHelp" placeholder="Nom d'utilisateur ou E-mail">
                    </div>
                    <div class="form-group" id="password">
                        <input name="password" type="password" class="form-control" placeholder="Mot de passe">
                        <a href="https://5booster.com/password/reset"><small id="emailHelp" class="form-text text-muted">Mot de passe oublié ?</small></a>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Connexion</button>
                    </div>

                    <input type="checkbox" name="remember" />
                    <small id="emailHelp" class="form-text text-muted">Se souvenir de moi</small>
                </form>
                <div class="result_title">
                </div>
            </div>

        </div>

    </div>

    <!-- Content -->

@endsection
