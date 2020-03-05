@extends('layout.client')
@section('content')
<!-- Contenu -->

<div class="d-flex flex-column" id="compte">
  <div class="card">
    <div class="card-body">
      <div class="row m-auto">
        <div class="col-sm">
          <div class="card">
            <div class="card-header">
              Coordonnées
            </div>
            <div class="card-body">
              <div class="row m-auto">
                <div class="col-sm">
                  <p> Téléphone </p>
                </div>
                <div class="col-sm">
                  <p> {{$user->telephone}} </p>
                </div>
              </div>
              <div class="row m-auto">
                <div class="col-sm">
                  <p> Email </p>
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
                  <p> Non connecté </p>
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
          <a href="{{url('/password/reset')}}" class="btn btn-primary stretched-link">Modifier le mot de passe</a>
            @if(!$user->hasVerifiedEmail())
                <a href="{{url('/email/verify')}}" class="btn btn-primary stretched-link">Verifier votre e-mail</a>
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
            <div class="card-header">
              Informations générales
            </div>
            <div class="card-body">
              <div class="row m-auto">
                <div class="col-sm">
                  <p> Pseudonyme </p>
                </div>
                <div class="col-sm">
                  <p> {{$user->username}} </p>
                </div>
              </div>
              <div class="row m-auto">
                <div class="col-sm">
                  <p> Date de naissance </p>
                </div>
                <div class="col-sm">
                  <p> {{$user->birthday}} </p>
                </div>
              </div>

              <div class="row m-auto">
                <div class="col-sm">
                  <p> Genre </p>
                </div>
                <div class="col-sm">
                  <p> {{$user->sex}} </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm mt-auto" align="right">
            <form method="post" action="/logout">
                <button type="submit" class="btn btn-danger">Deconnecter</button>
            </form>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- Contenu -->
@endsection
