@extends('layout.home')
@section('content')
<!-- Contenu -->
<div class="container">
    <div class="row my-auto">
        <div class="col-sm my-auto">
            <div class="card text-center" style="width: 25rem;">
                <img src="{{asset('resources/img/run.jpg')}}" class="card-img-top" alt="Image">
            </div>
        </div>
        <div class="col-sm my-auto">
            <p class="lead text-center">
                Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus.
            </p>
        </div>

    </div>

    <div class="row my-auto">
        <div class="col-sm my-auto">
            <p class="lead text-center">
                Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus.
            </p>
        </div>
        <div class="col-sm my-auto">
            <div class="card text-center" style="width: 25rem;">
                <img src="{{asset('resources/img/run.jpg')}}" class="card-img-top" alt="Image">
            </div>
        </div>
    </div>
</div>
<!-- Contenu -->
@endsection
