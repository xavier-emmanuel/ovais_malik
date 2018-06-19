@extends('layouts.master')

@section('stylesheets')
<!-- Owl Carousel -->
<link rel="stylesheet" href="{{ asset('/plugins/owl-carousel/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('/plugins/owl-carousel/owl.theme.default.css') }}">
@endsection
@section('content')
	<section id="hero-wrapper">
    <div id="hero-content">
      <div id="video-background">
        <video autoplay loop muted id="myVideo">
          <source src="{{ asset('/videos/test.mp4') }}" type="video/mp4">
        </video>
      </div>

      <div id="video-content">
        <span class="video-control">
          <i class="far fa-pause-circle"></i>
        </span>
      </div>
    </div>
  </section>

  <section id="audio-reel">
    <div class="container">
      <h1 class="text-center">Demo Reels</h1>
      <div class="headul"></div>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 reel-controller">
          <h4>Commercial Reel</h4>
          <div class="author-time">
            <em>
              <p class="small">By: Ovais Malik</p>
            </em>

            <p class="small">( 00:09 / 00:39 )</p>
          </div>

          <div class="reel-controls">
            <div class="row">
              <div class="col-lg-4 col-md-5 col-sm-6 col-xs-6 controller">
                <i class="fas fa-backward"></i>
                <i class="fas fa-play"></i>
                <i class="fas fa-forward"></i>
              </div>

              <div class="col-lg-8 col-md-7 col-sm-6 col-xs-6">
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="reel-container">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <span>
                  <i class="far fa-play-circle"></i>
                  &nbsp; Commercial Reel
                </span>
                <span>00:39</span>
              </li>
              <li class="list-group-item">
                <span>
                  <i class="far fa-play-circle"></i>
                  &nbsp; Video Game Reel
                </span>
                <span>01:11</span>
              </li>
              <li class="list-group-item">
                <span>
                  <i class="far fa-play-circle"></i>
                  &nbsp; Movie Trailer Reel
                </span>
                <span>00:59</span>
              </li>
              <li class="list-group-item">
                <span>
                  <i class="far fa-play-circle"></i>
                  &nbsp; Urdu &amp; Hindi Reel
                </span>
                <span>01:08</span>
              </li>
              <li class="list-group-item">
                <p class="small">
                  <em>
                    <a href="#">View More</a>
                  </em>
                </p>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

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

  <section id="testimonial">
    <div class="container">
      <h1 class="text-center">Client Testimonials</h1>
      <div class="headul"></div>
      <div class="owl-carousel">
        <blockquote>
          <span class="testimonial">
            Ovais was a pleasure to work with. He did an amazing job portraying the characters we hired him to play and exceeded our
            expectations. I highly recommend him as a top notch voice talent.
          </span>
          <br>
          <br>
          <p class="client-name">April Gianan
            <span class="company">|
              <em>Founder, Lamina Studios</em>
            </span>
          </p>
        </blockquote>

        <blockquote>
          <span class="testimonial">
            Ovais is an extremely professional voice actor and was a pleasure to work with!
          </span>
          <br>
          <br>
          <p class="client-name">Marek Rosa
            <span class="company">|
              <em>CEO/Founder, Keen Software House</em>
            </span>
          </p>
        </blockquote>

        <blockquote>
          <span class="testimonial">
            Our client was thrilled with not only the quality of the voice over, but the speed at which it was delivered. We would hire
            Ovais again in a heart beat.
          </span>
          <br>
          <br>
          <p class="client-name">Jeremy Viles
            <span class="company">|
              <em>Client Services, Cable Ad Net</em>
            </span>
          </p>
        </blockquote>

        <blockquote>
          <span class="testimonial">
            My client was extremely happy with your performance on the Engility commercial. When he's happy, I'm happy. Thank you Ovais!!
          </span>
          <br>
          <br>
          <p class="client-name">Richard Craig
            <span class="company">|
              <em>Owner, Craig Interactive</em>
            </span>
          </p>
        </blockquote>
      </div>
    </div>
  </section>

  <section id="brands">
    <div class="container">
      <div class="brand-wrapper">
        <div class="image-wrapper">
          <img src="{{ asset('/img/lamina.png') }}" alt="Company Name Here" width="100%;">
        </div>
        <div class="image-wrapper">
          <img src="{{ asset('/img/Keen_Software_House_logo.png') }}" alt="Company Name Here" width="100%;">
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
<!-- Owl Carousel JS -->
<script src="{{ asset('/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
<script>
  $(document).ready(function () {
    var testimonial = $('.owl-carousel');

    testimonial.owlCarousel({
      items: 1,
      loop: true,
      margin: 10,
      autoplay: true,
      autoplayTimeout: 5000,
      autoplayHoverPause: true
    });
  });
</script>
@endsection