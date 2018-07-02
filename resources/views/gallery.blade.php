@extends('layouts.master')

@section('stylesheets')
  <link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/plugins/fancybox/jquery.fancybox.min.css' : '/plugins/fancybox/jquery.fancybox.min.css') }}" />
@endsection

@section('content')
	<section class="gallery">
    <div class="container">
      <h1 class="text-center">Gallery</h1>
      <div class="headul"></div>
      <div class="d-flex flex-wrap justify-content-center">
        @foreach($images as $image)
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <figure>
            <a data-fancybox="gallery" href="{{ asset(App::environment('production') ? '/public/uploads/gallery/images/original/'.$image->image : '/uploads/gallery/images/original/'.$image->image) }}" data-caption="{{ $image->caption }}">
              <img src="{{ asset(App::environment('production') ? '/public/uploads/gallery/images/thumbnails/'.$image->image : '/uploads/gallery/images/thumbnails/'.$image->image) }}" alt="" width="100%">
            </a>
          </figure>
        </div>
        @endforeach
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