@extends('layout.slider')
@section('container')
<div class="card" id="form_coach">
  <div class="col" id="contact_coach">
    <h3 data-i18n="contacter-coach" class="text-center" id="coach-contact-title"></h3>

    <form action="{{url('client/contact_coach')}}" method="post" id="contact_form">
      <div class="form-group">
        <label data-i18n="title" for="coach-submit-title" id="coach-contact-input-title-label"></label>
        <input name="subject" type="text" class="form-control" id="coach-contact-input-title" aria-describedby="coach-contact-input-title-help" placeholder="">
        <small data-i18n="description-query" id="coach-contact-input-title-help" class="form-text text-muted"></small>
      </div>
      <div class="form-group">
        <label data-i18n="content" for="coach-submit-content" id="coach-contact-input-content-label"></label>
        <textarea class="form-control" id="coach-contact-input-content" rows="5" name="content" form="contact_form"></textarea>
      </div>
      <button data-i18n="submit" type="submit" class="btn btn-primary" style="left: 35%;position:relative;width: 20%;"></button>
    </form>
  </div>
  @if(session('msg'))
      <div class="alert alert-success" role="alert" id="contact_coach_msg">
         {{session('msg')}}
      </div>
    @endif
</div>
@endsection
