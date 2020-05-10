@extends('layout.slider')
@section('container')

    <p>{{$recette->title}}</p>

{{--    <p>{{$recette->keywords}}</p>--}}

{{--    <p>{{$recette->description}}</p>--}}

    <input type="button" value="Download" onclick="window.location.href='{{url('/recette/download').'/'.$recette->id}}'">
    <input class="submit_workouts" type="button" onclick="history.go(-1)" value="return">
@endsection

