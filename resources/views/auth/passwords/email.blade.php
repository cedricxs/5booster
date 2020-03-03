@extends('layout.home')

@section('content')

    @if(Session::has('status'))
        <p> {{Session::get('status')}}</p>
    @endif



    <div class="col-sm" id="email">
        <form class="Forget" method="post" action="{{url('/password/email')}}">

            {{csrf_field()}}
            <div class="form-group" id="mail">
                <input type="email" class="form-control" placeholder="Adresse mail" name="email"/>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
        </form>

    </div>
@endsection
