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
                        <a class="nav-link" href="{{url('client/sport')}}" id="sport">Sport</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('client/recettes')}}" id="recettes">Recettes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('client/perso')}}" id="perso">Développement Perso.</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('client/coach')}}" id="coach">Mon Coach</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('client/rdv')}}" id="rdv">Point de rdv</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('client/formulaire')}}" id="formulaire">Formulaire</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div id="main_container">
            @yield('container')
        </div>

    </main>
@endsection
