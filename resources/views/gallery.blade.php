@extends('layouts.master')

@section('stylesheets')
  <link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/plugins/fancybox/jquery.fancybox.min.css' : '/plugins/fancybox/jquery.fancybox.min.css') }}" />
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
              <img class="lazy" data-src="https://picsum.photos/300/200/?image=1079" alt="" width="100%">
            </a>
          </figure>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <figure>
            <a data-fancybox="gallery" href="https://picsum.photos/1200/800/?image=1077">
              <img class="lazy" data-src="https://picsum.photos/300/200/?image=1077" alt="" width="100%">
            </a>
          </figure>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <figure>
            <a data-fancybox="gallery" href="https://picsum.photos/1200/800/?image=1062">
              <img class="lazy" data-src="https://picsum.photos/300/200/?image=1062" alt="" width="100%">
            </a>
          </figure>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <figure>
            <a data-fancybox="gallery" href="https://picsum.photos/1200/800/?image=1050">
              <img class="lazy" data-src="https://picsum.photos/300/200/?image=1050" alt="" width="100%">
            </a>
          </figure>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <figure>
            <a data-fancybox="gallery" href="https://picsum.photos/1200/800/?image=1027">
              <img class="lazy" data-src="https://picsum.photos/300/200/?image=1027" alt="" width="100%">
            </a>
          </figure>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <figure>
            <a data-fancybox="gallery" href="https://picsum.photos/1200/800/?image=1024">
              <img class="lazy" data-src="https://picsum.photos/300/200/?image=1024" alt="" width="100%">
            </a>
          </figure>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <figure>
            <a data-fancybox="gallery" href="https://picsum.photos/1200/800/?image=9">
              <img class="lazy" data-src="https://picsum.photos/300/200/?image=9" alt="" width="100%">
            </a>
          </figure>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <figure>
            <a data-fancybox="gallery" href="https://picsum.photos/1200/800/?image=20">
              <img class="lazy" data-src="https://picsum.photos/300/200/?image=20" alt="" width="100%">
            </a>
          </figure>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('scripts')
  <script src="{{ asset(App::environment('production') ? '/public/plugins/fancybox/jquery.fancybox.min.js' : '/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
  <script>
    sr.reveal('.headul', {
      origin: 'left',
      distance: '3vw',
    });

    sr.reveal('figure', {}, 200);
  </script>
@endsection