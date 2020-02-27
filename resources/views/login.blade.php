@extends('layout.home')
@section('content')

    <!-- Content -->
    <div class="home-container">
        <div class="row">
            <div class="col-xs-12 col-md-6 offset-md-3" id="img-home">
                  <img src="{{ asset('resources/img/run.jpg') }}" class="img-fluid rounded" alt="Responsive image">
            </div>
            <div class="col-sm">
                <div class="card text-center" style="width: 25rem;">
                    <img src="{{asset('/img/run.jpg')}}" class="card-img-top" alt="Image">
                </div>
            </div>
            <div class="col-sm">
                <form class="right" method="post" action="{{url('login')}}">
                    {{csrf_field()}}
                    <div class="form-group" id="username">
                        <input name="username" class="form-control" aria-describedby="emailHelp" placeholder="Pseudo">
                    </div>
                    <div class="form-group" id="password">
                        <input name="password" type="password" class="form-control" placeholder="Mot de passe">

                        <a href="{{url('/password/reset')}}"><small id="emailHelp" class="form-text text-muted">Mot de passe oublié ?</small></a>

                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Connexion</button>
                    </div>

                    <input type="checkbox" name="remember" />
                    <small id="emailHelp" class="form-text text-muted">Se souvenir de moi</small>

                </form>
                <div class="result_title">
                @if(!is_object($errors))
                    <p>{{$errors}}</p>
                @endif
            </div>
            </div>

        </div>

    </div>
    <!-- Content -->

@endsection
