@extends('layouts.master')

@section('stylesheets')
@endsection
@section('content')
	<section id="about">
    <div class="container">
      <h1 class="text-center">About
        <span>Ovais Malik</span>
      </h1>
      <div class="headul"></div>
      <div class="row">
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
          <img src="{{ asset('/img/about-us-image.jpg') }}" alt="About Image" class="img-fluid">
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
          <p>Ovais Malik is a multilingual voice over talent with a unique flair. He was born in Pakistan and raised in LA,
            which helped cultivate his insatiable appetite for the creative arts, particularly in acting and music.
            <br>
            <br> Trustworthy is one of the first words clients use to describe Ovais' voice. Other words include Believable,
            Versatile, Fresh, Powerful, Authoritative, Sincere, and Guy Next Door.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="niche-studio">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 niche">
          <div class="box">
            <h4>Versality &amp; Niches</h4>
            <div class="headul"></div>
            <p>Being multilingual in English, Hindi, and Urdu has enabled Ovais to become a global voice talent ranging in everything
              from Commercials, Television, Video Games and Animation, to Movie Trailers, Documentaries, Film, Promos, ADR
              and much more.</p>
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 studio">
          <div class="box">
            <h4>Studio</h4>
            <div class="headul"></div>
            <ul>
              <li>
                <i class="fas fa-check"></i>&nbsp; Customized Recording Booth</li>
              <li>
                <i class="fas fa-check"></i>&nbsp; ISDN/Phone Patch/Skype</li>
              <li>
                <i class="fas fa-check"></i>&nbsp; MXL Heritage Genesis HE Microphone</li>
              <li>
                <i class="fas fa-check"></i>&nbsp; Custom PC/ Adobe Audition CC</li>
            </ul>
          </div>
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