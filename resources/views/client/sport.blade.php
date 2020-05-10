@extends('layout.slider')
@section('container')


    <div id="Programme_Finder" onclick="window.location.href='{{asset('client/filtre')}}'">
        <h4  >@lang('message.programme-finder')</h4>
        <img src="{{asset('img/finder.jpg')}}" width="80%" height="80%">
    </div>
    <div id="Tendances" onclick="window.location.href='{{asset('client/tendances')}}'">
        <h4  >@lang('message.tendances')</h4>
        <img src="{{asset('img/finder.jpg')}}" width="80%" height="80%">
    </div>
    <div id="Programme_Perso" onclick="window.location.href='{{asset('client/prog_perso')}}'">
        <h4 >@lang('message.programme-perso') </h4>
        <img src="{{asset('img/finder.jpg')}}" width="80%" height="80%">
    </div>

@endsection
