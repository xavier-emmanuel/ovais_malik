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
    </div>
  </section>
@endsection

@section('scripts')
  <!-- Fancybox -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>

  <script>
    sr.reveal('.headul', {
      origin: 'left',
      distance: '3vw',
    });

    sr.reveal('figure', {}, 200);
  </script>
@endsection