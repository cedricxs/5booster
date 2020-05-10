@extends('layout.slider')
@section('container')
<div class="card" id="form_coach">
  <div class="col" id="contact_coach">
    <h3  class="text-center" id="coach-contact-title">@lang('message.contacter-coach') </h3>

    <form action="{{url('client/contact_coach')}}" method="post" id="contact_form">
      <div class="form-group">
        <label   for="coach-submit-title" id="coach-contact-input-title-label">@lang('message.title')</label>
        <input name="subject" type="text" class="form-control" id="coach-contact-input-title" aria-describedby="coach-contact-input-title-help" placeholder="">
        <small  id="coach-contact-input-title-help" class="form-text text-muted"> @lang('message.description-query')</small>
      </div>
      <div class="form-group">
        <label for="coach-submit-content" id="coach-contact-input-content-label"> @lang('message.content') </label>
        <textarea class="form-control" id="coach-contact-input-content" rows="5" name="content" form="contact_form"></textarea>
      </div>
      <button   type="submit" class="btn btn-primary" style="left: 35%;position:relative;width: 20%;">@lang('message.submit')</button>
    </form>
  </div>
  @if(session('msg'))
      <div class="alert alert-success" role="alert" id="contact_coach_msg">
         {{session('msg')}}
      </div>
    @endif
</div>
@endsection
