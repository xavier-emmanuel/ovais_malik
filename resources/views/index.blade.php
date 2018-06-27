@extends('layouts.master')

@section('stylesheets')
<!-- Owl Carousel -->
<link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/plugins/owl-carousel/owl.carousel.min.css' : '/plugins/owl-carousel/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/plugins/owl-carousel/owl.theme.default.css' : '/plugins/owl-carousel/owl.theme.default.css') }}">

<!-- Perfect Scrollbar -->
<link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/plugins/perfect-scrollbar/perfect-scrollbar.css' : '/plugins/perfect-scrollbar/perfect-scrollbar.css') }}">
<style>
  .list-group-item {
    justify-content: space-between !important;
  }
  .li-show-more {
    justify-content: center !important;
  }
  .progress {
    width: 100% !important;
  }

  /* PULSE */

  @-webkit-keyframes pulse {
    0% {
      -webkit-transform: scale(1.5);
      transform: scale(1.5);
    }

    50% {
      -webkit-transform: scale(1);
      transform: scale(1);
    }

    100% {
      -webkit-transform: scale(1.5);
      transform: scale(1.5);
    }
  }

  .faa-pulse.animated.faa-fast,
  .faa-pulse.animated-hover.faa-fast:hover,
  .faa-parent.animated-hover:hover > .faa-pulse.faa-fast {
    -webkit-animation: pulse 0.5s linear infinite;
    animation: pulse 0.5s linear infinite;
  }

  .faa-pulse.animated.faa-slow,
  .faa-pulse.animated-hover.faa-slow:hover,
  .faa-parent.animated-hover:hover > .faa-pulse.faa-slow {
    -webkit-animation: pulse 3s linear infinite;
    animation: pulse 3s linear infinite;
  }
</style>
@endsection

@section('content')
	<section id="hero-wrapper">
    <div id="hero-content">
      <div id="video-background">
        <video autoplay loop muted id="myVideo">
          <source src="{{ asset(App::environment('production') ? '/public/videos/video_background.mp4' : '/videos/video_background.mp4') }}" type="video/mp4">
        </video>
      </div>

      <div id="video-content">
        <span class="video-control">
          <div class="video-control--is-circle video-volume">
            <i class="fas fa-volume-off"></i>
          </div>
          <div class="video-control--is-circle video-pause-play">
            <i class="fas fa-pause"></i>
          </div>
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
          <h4 class="audio-title"></h4>
          <audio controls id="audio-preview" hidden></audio>
          <div class="author-time">
            <em>
              <p class="small">By: Ovais Malik</p>
            </em>

            <p class="small audio-duration"></p>
          </div>

          <div class="reel-controls">
            <div class="row">
              <div class="col-lg-4 col-md-5 col-sm-6 col-xs-6 controller">
                <input type="hidden" id="hdn-audio-list-id" value="">
                <input type="hidden" id="hdn-audio-duration" value="">
                <span class="audio-control">
                  <i class="fas fa-backward"></i>
                  <i id="audio-play" class="fas fa-play"></i>
                  <i class="fas fa-forward"></i>
                </span>
              </div>

              <div class="col-lg-8 col-md-7 col-sm-6 col-xs-6">
                <div class="progress" id="progress">
                  <div class="progress-bar" id="progress-bar" role="progressbar"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="reel-container">
            <ul class="list-group list-group-flush demo-reels">
              <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
              @foreach($data as $audio)
                <li class="list-group-item audio-list audio-list-id{{ $audio->id }}" data-id="{{ $audio->id }}" data-title="{{ $audio->title }}" data-audio-duration="{{ $audio->audio_duration }}" data-audio-file="{{ $audio->audio_file }}">
                  <span class="playlist-title">
                    <!-- Add this <i> tag below when its <li> parent tag has an active class.
                         This should only appear in currently playing music. -->
                    <i class="fas fa-headphones" style="font-size: 14px;"></i>
                    &nbsp; {{ $audio->title }}
                  </span>
                  <span>{{ $audio->audio_duration }}</span>
                </li>
              @endforeach
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
          <img src="{{ asset(App::environment('production') ? '/public/img/about-us-image.jpg' : '/img/about-us-image.jpg') }}" alt="About Image" class="img-fluid">
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
          <p class="about">Ovais Malik is a multilingual voice over talent with a unique flair. He was born in Pakistan and raised in LA,
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
          <img src="{{ asset(App::environment('production') ? '/public/img/lamina.png' : '/img/lamina.png') }}" alt="Lamina Studios, LLC" width="100%;">
        </div>
        <div class="image-wrapper">
          <img src="{{ asset(App::environment('production') ? '/public/img/Keen_Software_House_logo.png' : '/img/Keen_Software_House_logo.png') }}" alt="Keen Software House Logo" width="100%;">
        </div>
        <div class="image-wrapper">
          <img src="{{ asset(App::environment('production') ? '/public/img/Englility.jpg' : '/img/Englility.jpg') }}" alt="KeeEnglility" width="100%;">
        </div>
        <div class="image-wrapper">
          <img src="{{ asset(App::environment('production') ? '/public/img/metlife.jpg' : '/img/metlife.jpg') }}" alt="Metlife Logo" width="100%;">
        </div>
        <div class="image-wrapper">
          <img src="{{ asset(App::environment('production') ? '/public/img/ncsoft-logo.jpg' : '/img/ncsoft-logo.jpg') }}" alt="Ncsoft" width="100%;">
        </div>
      </div>
    </div>
  </section>
@endsection

@section('scripts')
<!-- Owl Carousel JS -->
<script src="{{ asset(App::environment('production') ? '/public/plugins/owl-carousel/owl.carousel.min.js' : '/plugins/owl-carousel/owl.carousel.min.js') }}"></script>

<!-- Perfect Scrollbar JS -->
<script src="{{ asset(App::environment('production') ? '/public/plugins/perfect-scrollbar/perfect-scrollbar.js' : '/plugins/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

<script src="{{ asset(App::environment('production') ? '/public/js/pages/home.js' : '/js/pages/home.js') }}"></script>
<script>
  // Safari video promise
  var promise = document.querySelector('video').play();
  var pauseIcon = document.querySelector('.video-pause-play');
  var node = document.createElement('i');

  if (promise !== undefined) {
    promise.catch(error => {
      pauseIcon.children[0].remove();
      pauseIcon.appendChild(node).classList.add('fas', 'fa-play');
    }).then(() => {
        // Auto-play started
    });
  }
  var ps = new PerfectScrollbar('.reel-container');

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