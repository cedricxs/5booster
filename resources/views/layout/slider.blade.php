@extends('layout.client')

@section('content')

    <!-- Wrapper de sidebar -->
    <main id="centre">

        <!-- Wrapper of sidebar -->
        <div id="wrapper">

            <!-- Sidebar -->
            <nav id="sidebar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('client/sport')}}" id="sport">@lang('message.sport')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('client/recettes')}}" id="recettes">@lang('message.recettes')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('client/perso')}}" id="perso">@lang('message.developpement-perso')</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link" href="{{url('client/coach')}}" id="coach">@lang('message.mon-coach')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('client/formulaire')}}" id="formulaire"> @lang('message.formulaire')</a>
                    </li>
                </ul>
            </nav>
        </div>

        <div id="main_container">
            @yield('container')
        </div>

    </main>
@endsection
