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
                    {{csrf_field()}}
                    <div class="form-group" id="username">
                        <input name="email" class="form-control" aria-describedby="emailHelp" placeholder="@lang('message.email')">
                    </div>
                    <div class="form-group" id="password">
                        <input name="password" type="password" class="form-control" placeholder="@lang('message.mdp')">
                        <a href="{{url('password/reset')}}"><small id="emailHelp" class="nav-link">@lang('message.mdp-oublier')</small></a>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">@lang('message.connexion')</button>
                    </div>

                    <span style="display:inline-block">
                        <input type="checkbox" name="remember" />
                        <small id="emailHelp" class="form-text text-muted">@lang('message.souvenir-moi')</small>
                    </span>
                </form>
                @if(session('msg'))
                    <div class="alert alert-danger" role="alert">{{session('msg')}}</div>
                @endif
            </div>

        </div>

    </div>

    <!-- Content -->

@endsection
