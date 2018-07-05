@extends('layouts.master')

@section('stylesheets')
  <link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/plugins/fancybox/jquery.fancybox.min.css' : '/plugins/fancybox/jquery.fancybox.min.css') }}" />
@endsection

@section('content')
	<section class="gallery">
    <div class="container">
      <h1 class="text-center">Gallery</h1>
      <div class="headul"></div>
      <div class="grid m-auto">
        @foreach($images as $image)
          <div class="grid-sizer"></div>
          <div class="grid-item">
            <figure>
              <a data-fancybox="gallery" href="{{ asset(App::environment('production') ? '/public/uploads/gallery/images/original/'.$image->image : '/uploads/gallery/images/original/'.$image->image) }}" data-caption="{{ $image->caption }}">
              <img class="lazyload" src="{{ asset(App::environment('production') ? 'public/uploads/gallery/images/thumbnail/'.$image->image : 'uploads/gallery/images/thumbnail/'.$image->image) }}" data-srcset="{{ asset(App::environment('production') ? 'public/uploads/gallery/images/extra-small/'.$image->image : 'uploads/gallery/images/extra-small/'.$image->image) }} 250w, {{ asset(App::environment('production') ? 'public/uploads/gallery/images/small/'.$image->image : 'uploads/gallery/images/small/'.$image->image) }} 540w, {{ asset(App::environment('production') ? 'public/uploads/gallery/images/medium/'.$image->image : 'uploads/gallery/images/medium/'.$image->image) }} 720w, {{ asset(App::environment('production') ? 'public/uploads/gallery/images/original/'.$image->image : 'uploads/gallery/images/original/'.$image->image) }} 1140w" sizes="100vw" alt="{{ $image->caption}}" width="100%">
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
  <script src="{{ asset(App::environment('production') ? '/public/plugins/masonry/masonry.pkgd.min.js' : '/plugins/masonry/masonry.pkgd.min.js') }}"></script>
  <script src="{{ asset(App::environment('production') ? '/public/plugins/masonry/imagesloaded.pkgd.min.js' : '/plugins/masonry/imagesloaded.pkgd.min.js') }}"></script>
  <script>
    var grid = document.querySelector('.grid');
    var msnry;

    imagesLoaded( grid, function() {
      msnry = new Masonry( grid, {
        itemSelector: '.grid-item',
        columnWidth: '.grid-sizer',
        percentPosition: true,
        gutter: 10,
        transitionDuration: '0.8s'
      });
    });

    sr.reveal('.headul', {
      origin: 'left',
      distance: '3vw',
    });

    sr.reveal('figure', {}, 200);
  </script>
@endsection