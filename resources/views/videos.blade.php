@extends('layouts.master')

@section('stylesheets')
@endsection
@section('content')
	<section class="videos">
    <div class="container">
      <h1 class="text-center">Videos</h1>
      <div class="headul"></div>

      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <iframe width="100%" height="200" src="https://www.youtube.com/embed/4pgMFb_pO_k" frameborder="0" allow="autoplay; encrypted-media"
            allowfullscreen></iframe>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <iframe width="100%" height="200" src="https://www.youtube.com/embed/EzUrgAxkq94" frameborder="0" allow="autoplay; encrypted-media"
            allowfullscreen></iframe>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <iframe width="100%" height="200" src="https://www.youtube.com/embed/MMDerLJoUCs" frameborder="0" allow="autoplay; encrypted-media"
            allowfullscreen></iframe>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <iframe width="100%" height="200" src="https://www.youtube.com/embed/W9nxJxztQoo" frameborder="0" allow="autoplay; encrypted-media"
            allowfullscreen></iframe>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <iframe width="100%" height="200" src="https://www.youtube.com/embed/kUqj9_cL2dw" frameborder="0" allow="autoplay; encrypted-media"
            allowfullscreen></iframe>
        </div>
      </div>

    </div>
  </section>

  <!-- Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content text-center">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img src="{{ asset('/img/logo.jpg') }}" alt="Ovais Malik Voice Over Logo" width="100px">
          <br>
          <br>
          <br>
          <form action="">
            <div class="form-group text-left">
              <label for="login-username">Username:</label>
              <input type="text" class="form-control" id="login-username">
            </div>
            <div class="form-group text-left">
              <label for="login-password">Password:</label>
              <input type="password" class="form-control" id="login-password">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-block">LOGIN</button>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
@endsection