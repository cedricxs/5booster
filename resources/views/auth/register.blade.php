@extends('layout.home')
@section('content')

<!-- Content -->
  <div class="container d-flex flex-column">
      <div class="row">
          <div class="col-sm">
          </div>
          <div class="col-sm">
              <form class="Inscription" method="post" action="{{url('/register')}}">
                  {{csrf_field()}}
                  <div class="form-group" id="mail">
                      <input type="email" class="form-control" placeholder="@lang('message.email')" name="email"/>
                  </div>
                  <div class="form-group" id="password">
                      <input type="password" class="form-control" placeholder="@lang('message.mdp')" name="password"/>
                  </div>
                  <div class="form-group" id="phone">
                      <input type="tel" class="form-control" placeholder="@lang('message.telephone')" name="telephone"/>
                  </div>
                  <div class="form-group" id="username">
                      <input type="text" class="form-control" placeholder="@lang('message.username')" name="username"/>
                  </div>
                  <div class="form-group" id="birthday">
                      <small id="dateHelp" class="form-text text-muted">@lang('message.date-naissance')</small>
                      <input type="date" class="form-control" placeholder="@lang('message.date-naissance')" name="birthday"/>
                  </div>
                  <div class="form-group" id="genre">
                      <fieldset>
                          <legend>@lang('message.genre')</legend>
                          <div>
                              <input type="radio" id="homme" name="sex" value="homme"/>
                              <label for="homme">@lang('message.homme')</label>
                              <input type="radio" id="femme" name="sex" value="femme"/>
                              <label for="homme">@lang('message.femme')</label>
                          </div>
                      </fieldset>
                  </div>
                  <div class="text-right">
                      <button type="submit" class="btn btn-primary">@lang('message.inscription')</button>
                  </div>
              </form>
          </div>
          <div class="col-sm">
          </div>
      </div>
  </div>
<!-- Content -->

@endsection
