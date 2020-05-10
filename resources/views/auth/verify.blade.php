@extends('layout.home')

@section('content')

    @if(Session::has('resent'))
        @if(Session::get('resent'))
            <p>@lang('message.we-have-sent-email')</p>
        @endif
    @endif



    <div class="col-sm" id="email">
        <form class="Verify" method="post" action="{{url('/email/resend')}}">

            {{csrf_field()}}
            <div class="form-group" id="mail">
                <input type="email" class="form-control" placeholder="@lang('message.email')" name="email"/>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">@lang('message.verifier')</button>
            </div>
        </form>

    </div>
@endsection
