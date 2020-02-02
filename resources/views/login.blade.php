@extends('layout.home')
@section('content')
<!-- Contenu -->

<div class="container d-flex flex-column">
    <div class="row">
        <div class="col-sm">
        </div>
        <div class="col-sm">
            <div class="card text-center" style="width: 25rem;">
                <img src="{{asset('resources/img/run.jpg')}}" class="card-img-top" alt="Image">
            </div>
        </div>
        <div class="col-sm">
            <form class="right" method="post" action="{{url('login')}}">
                <div class="form-group" id="username">
                    <input name="username" class="form-control" aria-describedby="emailHelp" placeholder="Nom d'utilisateur">
                </div>
                <div class="form-group" id="password">
                    <input name="password" type="password" class="form-control" placeholder="Mot de passe">
                    <small id="emailHelp" class="form-text text-muted">Mot de passe oublié ?</small>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Connexion</button>
                </div>
                @if(count($errors)>0)
                    <div class="mark">
                        @if(is_object($errors))
                            @foreach($errors->all() as $error)
                                <p>{{$error}}</p>
                            @endforeach
                        @else
                            <p>{{$errors}}</p>
                        @endif
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>

<!-- Contenu -->
@endsection
