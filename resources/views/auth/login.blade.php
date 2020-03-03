@extends('layout.home')
@section('content')

    <!-- Content -->
    <div class="container d-flex flex-column">
        <div class="row">
            <div class="col-sm">
            </div>
            <div class="col-sm">
                <div class="card text-center" style="width: 25rem;">
                    <img src="{{asset('img/run.jpg')}}" class="card-img-top" alt="Image">
                </div>
            </div>
            <div class="col-sm">
                <form class="right" method="post" action="{{url('/login')}}">
                    <input type="hidden" name="_token" value="LAd6l5BdPY3aWyCrWYTBeMvCc04OQdFx8a3hIbiP">
                    <div class="form-group" id="username">
                        <input name="email" class="form-control" aria-describedby="emailHelp" placeholder="E-mail">
                    </div>
                    <div class="form-group" id="password">
                        <input name="password" type="password" class="form-control" placeholder="Mot de passe">
                        <a href="{{url('password/reset')}}"><small id="emailHelp" class="form-text text-muted">Mot de passe oublié ?</small></a>
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