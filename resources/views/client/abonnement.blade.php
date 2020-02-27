@extends('layout.client')
@section('content')

<!-- Content -->
<div class="container d-flex flex-column">
  <div class="row m-auto">
    <div class="col-sm">
      <div class="card text-center" style="width: 18rem;">
        <img class="card-img-top" src="{{asset('resources/img/yoga.webp')}}" alt="Image">
          <div class="card-body">
            <h5 class="card-title">Free</h5>
            <p class="card-text">L'abonnement de base!</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Option 1</li>
            <li class="list-group-item">Option 2</li>
            <li class="list-group-item">Option 3</li>
          </ul>
          <div class="card-body">
            <a href="#" class="card-link">S'abonner</a>
          </div>
        </div>
    </div>
    <div class="col-sm">
      <div class="card text-center" style="width: 18rem;">
        <img class="card-img-top" src="{{asset('resources/img/run.jpg')}}" alt="Image">
          <div class="card-body">
            <h5 class="card-title">Boost</h5>
            <p class="card-text">L'idéal pour se faire plaisir</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Option 1</li>
            <li class="list-group-item">Option 2</li>
            <li class="list-group-item">Option 3</li>
            <li class="list-group-item">Option 4</li>
          </ul>
          <div class="card-body">
            <a href="#" class="card-link">S'abonner</a>
          </div>
        </div>
    </div>
    <div class="col-sm">
      <div class="card text-center" style="width: 18rem;">
        <img class="card-img-top" src="{{asset('resources/img/training.jpg')}}" alt="Image">
          <div class="card-body">
            <h5 class="card-title">Max Boost</h5>
            <p class="card-text">Allez-y à fond</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Option 1</li>
            <li class="list-group-item">Option 2</li>
            <li class="list-group-item">Option 3</li>
            <li class="list-group-item">Option 4</li>
            <li class="list-group-item">Option 5</li>
            <li class="list-group-item">Option 6</li>
          </ul>
          <div class="card-body">
            <a href="#" class="card-link">S'abonner</a>
          </div>
        </div>
    </div>
  </div>
</div>
<!-- Content -->

@endsection
