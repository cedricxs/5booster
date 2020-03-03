@extends('layout.slider')
@section('container')


    <div id="Programme_Finder" onclick="window.location.href='{{asset('client/filtre')}}'">
        <h4>Programme Finder</h4>
        <img src="{{asset('img/finder.png')}}" width="80%" height="80%">
    </div>
    <div id="Tendances" onclick="window.location.href='{{asset('client/tendances')}}'">
        <h4>&nbsp;&nbsp;&nbsp;Tendances</h4>
        <img src="{{asset('img/finder.png')}}" width="80%" height="80%">
    </div>
    <div id="Programme_Perso" onclick="window.location.href='{{asset('client/prog_perso')}}'">
        <h4>Programme Perso</h4>
        <img src="{{asset('img/finder.png')}}" width="80%" height="80%">
    </div>

@endsection
