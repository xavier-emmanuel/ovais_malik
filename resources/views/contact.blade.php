@extends('layouts.master')

@section('stylesheets')
  <link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/plugins/toast-master/css/jquery.toast.css' : '/plugins/toast-master/css/jquery.toast.css') }}">
  <style>
    .error {
      color: red !important;
      border-color: red !important;
    }
  </style>
@endsection

@section('content')
	<section id="contact">
    <div class="container">
      <h1 class="text-center">Contact <span>Ovais</span></h1>
      <div class="headul"></div>
      <p class="lead text-center">Are you looking for the right voiceover actor for your <span>commercials, movie trailer, narration for video game software</span> and other voice talent project?<br><br>I'd love to hear from you, feel free to fill-out the form.</p><br>
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
          <div class="form-wrapper">
            <form id="frm-contact" name="frm_contact" method="post" action="/contact/send">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="contact-name">Name:
                      <span>*</span>
                    </label>
                    <input type="text" class="form-control" id="contact-name" name="contact_name">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="contact-email">Email:
                      <span>*</span>
                    </label>
                    <input type="email" class="form-control" id="contact-email" name="contact_email">
                  </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="contact-subject">Subject:
                    </label>
                    <input type="text" class="form-control" id="contact-subject" name="contact_subject">
                  </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="contact-message">Message:
                      <span>*</span>
                    </label>
                    <textarea name="message" id="contact-message" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
                  <button type="submit" class="btn btn-primary btn-send">
                    <i class="fas fa-paper-plane"></i>&nbsp; Send
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-2"></div>
      </div>
    </div>
  </section>
@endsection

@section('scripts')
  <script src="{{ asset(App::environment('production') ? '/public/js/pages/contact.js' : '/js/pages/contact.js') }}"></script>
  <script src="{{ asset(App::environment('production') ? '/public/plugins/toast-master/js/jquery.toast.js' : '/plugins/toast-master/js/jquery.toast.js') }}"></script>
  <script>
    sr.reveal('.headul', {
      origin: 'left',
      distance: '3vw',
    });

    sr.reveal('.form-wrapper')
  </script>
@endsection