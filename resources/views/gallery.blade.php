@extends('layouts.master')

@section('stylesheets')
<!-- Fancybox -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
@endsection
@section('content')
	<section class="gallery">
    <div class="container">
      <h1 class="text-center">Gallery</h1>
      <div class="headul"></div>
      <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <figure>
            <a data-fancybox="gallery" href="https://picsum.photos/1200/800/?image=1079" data-caption="My caption">
              <img src="https://picsum.photos/300/200/?image=1079" alt="" width="100%">
            </a>
          </figure>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <figure>
            <a data-fancybox="gallery" href="https://picsum.photos/1200/800/?image=1077">
              <img src="https://picsum.photos/300/200/?image=1077" alt="" width="100%">
            </a>
          </figure>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <figure>
            <a data-fancybox="gallery" href="https://picsum.photos/1200/800/?image=1062">
              <img src="https://picsum.photos/300/200/?image=1062" alt="" width="100%">
            </a>
          </figure>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <figure>
            <a data-fancybox="gallery" href="https://picsum.photos/1200/800/?image=1050">
              <img src="https://picsum.photos/300/200/?image=1050" alt="" width="100%">
            </a>
          </figure>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <figure>
            <a data-fancybox="gallery" href="https://picsum.photos/1200/800/?image=1027">
              <img src="https://picsum.photos/300/200/?image=1027" alt="" width="100%">
            </a>
          </figure>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <figure>
            <a data-fancybox="gallery" href="https://picsum.photos/1200/800/?image=1024">
              <img src="https://picsum.photos/300/200/?image=1024" alt="" width="100%">
            </a>
          </figure>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <figure>
            <a data-fancybox="gallery" href="https://picsum.photos/1200/800/?image=9">
              <img src="https://picsum.photos/300/200/?image=9" alt="" width="100%">
            </a>
          </figure>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <figure>
            <a data-fancybox="gallery" href="https://picsum.photos/1200/800/?image=20">
              <img src="https://picsum.photos/300/200/?image=20" alt="" width="100%">
            </a>
          </figure>
        </div>
      </div>
      <div class="text-center load-more">
        <a href="#" class="btn btn-outline">LOAD MORE</a>
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
<!-- Fancybox -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
@endsection