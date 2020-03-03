@extends('layout.home')

@section('content')

    @if(Session::has('resent'))
        @if(Session::get('resent'))
            <p>we have sent the verify message to your email</p>
        @endif
    @endif



    <div class="col-sm" id="email">
        <form class="Forget" method="post" action="{{url('/email/resend')}}">

            {{csrf_field()}}
            <div class="form-group" id="mail">
                <input type="email" class="form-control" placeholder="Adresse mail" name="email"/>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Verifier</button>
            </div>
        </form>

    </div>
@endsection
