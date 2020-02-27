@extends('layout.home')
@section('content')

    <!-- Content -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6 offset-md-3" id="img-home">
                  <img src="{{ asset('resources/img/run.jpg') }}" class="img-fluid rounded" alt="Responsive image">
            </div>
            <div class="col-xs-12 col-md-3">
                <form class="right" method="post" action="{{ url('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group" id="username">
                        <input name="username" class="form-control" aria-describedby="emailHelp" placeholder="Pseudo">
                    </div>
                    <div class="form-group" id="password">
                        <input name="password" type="password" class="form-control" placeholder="Mot de passe">
                        <a id="emailHelp" class="small" href="">Mot de passe oublié ?</a>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Connexion</button>
                    </div>
                    @if(isset($msg)>0)
                        <p>{{ $msg }}</p>
                    @endif
                </form>
            </div>
        </div>
    </div>
    <!-- Content -->

@endsection
