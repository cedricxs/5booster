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
                        <a data-i18n="sport" class="nav-link" href="{{url('client/sport')}}" id="sport"></a>
                    </li>
                    <li class="nav-item">
                        <a data-i18n="recettes" class="nav-link" href="{{url('client/recettes')}}" id="recettes"></a>
                    </li>
                    <li class="nav-item">
                        <a data-i18n="developpement-perso" class="nav-link" href="{{url('client/perso')}}" id="perso"></a>
                    </li>
                    <li class="nav-item">
                        <a data-i18n="mon-coach" class="nav-link" href="{{url('client/coach')}}" id="coach"></a>
                    </li>
                    <li class="nav-item">
                        <a data-i18n="formulaire" class="nav-link" href="{{url('client/formulaire')}}" id="formulaire"></a>
                    </li>
                </ul>
            </nav>
        </div>

        <div id="main_container">
            @yield('container')
        </div>

    </main>
@endsection
