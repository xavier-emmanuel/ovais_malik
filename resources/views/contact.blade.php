@extends('layouts.master')

@section('stylesheets')
@endsection

@section('content')
	<section id="contact">
    <div class="container">
      <h1 class="text-center">Contact
        <span>Ovais Malik</span>
      </h1>
      <div class="headul"></div>

      <div class="form-wrapper">
        <form action="">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              <div class="form-group">
                <label for="contact-name">Name:
                  <span>*</span>
                </label>
                <input type="text" class="form-control" id="contact-name" name="contact_name">
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              <div class="form-group">
                <label for="contact-email">Email:
                  <span>*</span>
                </label>
                <input type="text" class="form-control" id="contact-email" name="contact_email">
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              <div class="form-group">
                <label for="contact-subject">Subject:
                  <span>*</span>
                </label>
                <input type="text" class="form-control" id="contact-subject" name="contact_subject">
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="form-group">
                <label for="contact-message">Message:
                  <span>*</span>
                </label>
                <textarea name="contact_message" id="contact-message" cols="30" rows="10" class="form-control"></textarea>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-paper-plane"></i>&nbsp; Send
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection

@section('scripts')
  <script>
    sr.reveal('.headul', {
      origin: 'left',
      distance: '100px',
    });

    sr.reveal('.form-wrapper')
  </script>
@endsection