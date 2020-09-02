@extends('layout.client')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style_workout.css') }}">
    <div id="workout-view" class="col pt-5">
        @if($description->count()>0)
            <div id="workout-view-description" class="row">
                <div id="workout-view-description-card" class="col-10 card offset-1">
                    <div class="row mx-1">
                        <div id="workout-view-description-whom" class="col text-right text-uppercase workout-view-decription-text vertical-centered">
                            <h3>{{$description[0]->title}}</h3>
                        </div>
                        <div id="workout-view-description-to-whom" class="col text-center workout-view-decription-text">
                            <div class="col border-left my-2">
                                <p>{{$description[0]->description}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row border-top mx-1">

                        <div id="workout-view-description-why-for" class="col text-center workout-view-decription-text">
                            <div class="col border-right my-2">
                                <p>{{$description[1]->description}}</p>
                            </div>
                        </div>
                        <div id="workout-view-description-why" class="col text-left text-uppercase workout-view-decription-text vertical-centered">
                            <h3>{{$description[1]->title}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="row mt-3">
            <div class="col-2">
                <div id="workout-view-video-card" class="d-flex flex-column align-content-stretch flex-fill justify-content-around">
                    <!-- Button trigger modal -->
                    <button id="btn_workout_video" type="button" class="btn btn-primary" data-toggle="modal" data-target="#workout-exercise-modal">
                        Video
                    </button>

                    <!-- Modal -->
                    <div class="modal" id="workout-exercise-modal" tabindex="-1" role="dialog" aria-labelledby="workout-exercise-modal-label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="workout-exercise-modal-label">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <iframe width="400" height="300" frameborder="0" allowfullscreen="false" src=""></iframe>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        // Load video
                        $('#workout-exercise-modal').on('shown.bs.modal', function () {
                            var src = "https://youtube.com/embed/VV0PJoGp_Zo"
                            $('#workout-exercise-modal iframe').attr('src', src);
                        });


                        // Close video
                        $('#workout-exercise-modal').on('hidden.bs.modal', function () {
                            $('#workout-exercise-modal iframe').removeAttr("src");;
                        });
                    </script>
                </div>
            </div>

            <div id="workout-view-content" class="col-8 card">
                <div class="row">
                    <div id="workout-view-title" class="col text-center mt-3">
                        <h1>{{$workout->title}}</h1>
                    </div>
                </div>

                @if($exercices->count()>0)
                    @foreach($exercices as $exercice)
                        <div class="row border-top my-5 mx-1">
                            <div id="workout-view-exercise-1" class="exercise">
                                <div id="workout-view-exercise-1-title" class="text-center workout-view-exercise-title my-3">
                                    <h3>{{$exercice->title}}</h3>
                                </div>
                                <div id="workout-view-exercise-1-img-container" class="row">
                                    @foreach(explode(';',$exercice->imgs) as $img)
                                        <div id="workout-view-exercise-1-img-1" class="workout-img col">
                                            <img src='{{asset("img/workouts/$workout->title/$exercice->title/$img")}}' class="img-thumbnail">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>

    </div>

@endsection

