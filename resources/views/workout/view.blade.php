@extends('layout.slider')
@section('container')

    <p>{{$workout->title}}</p>

{{--    <p>{{$workout->keywords}}</p>--}}

{{--    <p>{{$workout->description}}</p>--}}

    <input type="button" value="Download" onclick="window.location.href='{{url('/workout/download').'/'.$workout->id}}'">
    <input class="submit_workouts" type="button" onclick="history.go(-1)" value="return">
@endsection

