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
        <figure class="mx-2">
          <a data-fancybox="gallery" href="https://picsum.photos/1200/800/?image=1079" data-caption="My caption">
            <img class="lazyload" src="https://picsum.photos/12/8/?image=1079" data-src="https://picsum.photos/250/175/?image=1079" alt="" width="100%">
          </a>
        </figure>
        <figure class="mx-2">
          <a data-fancybox="gallery" href="https://picsum.photos/1200/800/?image=1077" data-caption="My caption">
            <img class="lazyload" src="https://picsum.photos/12/8/?image=1077" data-src="https://picsum.photos/250/175/?image=1077" alt="" width="100%">
          </a>
        </figure>
        <figure class="mx-2">
          <a data-fancybox="gallery" href="https://picsum.photos/1200/800/?image=1062" data-caption="My caption">
            <img class="lazyload" src="https://picsum.photos/12/8/?image=1062" data-src="https://picsum.photos/250/175/?image=1062" alt="" width="100%">
          </a>
        </figure>
        <figure class="mx-2">
          <a data-fancybox="gallery" href="https://picsum.photos/1200/800/?image=1050" data-caption="My caption">
            <img class="lazyload" src="https://picsum.photos/12/8/?image=1050" data-src="https://picsum.photos/250/175/?image=1050" alt="" width="100%">
          </a>
        </figure>
        <figure class="mx-2">
          <a data-fancybox="gallery" href="https://picsum.photos/1200/800/?image=1027" data-caption="My caption">
            <img class="lazyload" src="https://picsum.photos/12/8/?image=1027" data-src="https://picsum.photos/250/175/?image=1027" alt="" width="100%">
          </a>
        </figure>
        <figure class="mx-2">
          <a data-fancybox="gallery" href="https://picsum.photos/1200/800/?image=1024" data-caption="My caption">
            <img class="lazyload" src="https://picsum.photos/12/8/?image=1024" data-src="https://picsum.photos/250/175/?image=1024" alt="" width="100%">
          </a>
        </figure>
        <figure class="mx-2">
          <a data-fancybox="gallery" href="https://picsum.photos/1200/800/?image=9" data-caption="My caption">
            <img class="lazyload" src="https://picsum.photos/12/8/?image=9" data-src="https://picsum.photos/250/175/?image=9" alt="" width="100%">
          </a>
        </figure>
        <figure class="mx-2">
          <a data-fancybox="gallery" href="https://picsum.photos/1200/800/?image=20" data-caption="My caption">
            <img class="lazyload" src="https://picsum.photos/12/8/?image=20" data-src="https://picsum.photos/250/175/?image=20" alt="" width="100%">
          </a>
        </figure>
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