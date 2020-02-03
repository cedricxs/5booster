@extends('layout.home')
@section('content')
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

@endsection
