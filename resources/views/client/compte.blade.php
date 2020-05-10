@extends('layout.client')
@section('content')
<!-- Contenu -->

<div class="d-flex flex-column" id="compte">
  <div class="card">
    <div class="card-body">
      <div class="row m-auto">
        <div class="col-sm">
          <div class="card">
            <div  class="card-header">
                @lang('message.coordonnees')
            </div>
            <div class="card-body">
              <div class="row m-auto">
                <div class="col-sm">
                  <p  > @lang('message.telephone') </p>
                </div>
                <div class="col-sm">
                  <p> {{$user->telephone}} </p>
                </div>
              </div>
              <div class="row m-auto">
                <div class="col-sm">
                  <p> @lang('message.email') </p>
                </div>
                <div class="col-sm">
                  <p> {{$user->email}} </p>
                </div>
              </div>
              <div class="row m-auto">
                <div class="col-sm">
                  <p> Google </p>
                </div>
                <div class="col-sm">
                  <p  > @lang('message.non-connecte') </p>
                </div>
              </div>
              <div class="row m-auto">
                <div class="col-sm">
                  <p> Facebook </p>
                </div>
                <div class="col-sm">
                  <p> facebook.com </p>
                </div>
              </div>
            </div>
          </div>
          <a   href="{{url('/password/reset')}}" class="btn btn-primary">@lang('message.modifier-mdp')</a>
            @if(!$user->hasVerifiedEmail())
                <a   href="{{url('/email/verify')}}" class="btn btn-primary">@lang('message.verifier-email')</a>
            @endif
        </div>
        <div class="col-sm" align="center">
          <div class="card text-center" style="width: 10rem;">
            <img src="{{asset('/img/run.jpg')}}" class="card-img-top" alt="Image">
          </div>
        </div>
      </div>
      <div class="row m-auto">
        <div class="col-sm">
          <div class="card">
            <div   class="card-header">
                @lang('message.information-generale')
            </div>
            <div class="card-body">
              <div class="row m-auto">
                <div class="col-sm">
                  <p  > @lang('message.pseudonyme') </p>
                </div>
                <div class="col-sm">
                  <p> {{$user->username}} </p>
                </div>
              </div>
              <div class="row m-auto">
                <div class="col-sm">
                  <p> @lang('message.date-naissance') </p>
                </div>
                <div class="col-sm">
                  <p> {{join("-",array_reverse(explode('-',$user->birthday)))}} </p>
                </div>
              </div>

              <div class="row m-auto">
                <div class="col-sm">
                  <p> @lang('message.genre') </p>
                </div>
                <div class="col-sm">
                  <p > @lang("message.$user->sex") </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm mt-auto" align="right">
            <form method="post" action="/logout">
                <button   type="submit" class="btn btn-danger">@lang('message.deconnecter')</button>
            </form>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- Contenu -->
@endsection
