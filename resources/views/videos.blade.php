@extends('layouts.master')

@section('stylesheets')
@endsection

@section('content')
	<section class="videos">
    <div class="container">
      <h1 class="text-center">Videos</h1>
      <div class="headul"></div>
        <div class="video__wrapper">
          @foreach($data as $video)
          <div class="video__card">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="lazyload embed-responsive-item" src="https://www.youtube.com/embed/{{ $video->link }}?showinfo=0" encrypted-media allowfullscreen></iframe>
            </div>
            <div class="video__details p-4">
              <h5 class="video__details--is-title">{{ $video->title }}</h5>
              <p class="small text-muted video__details--is-description">
                <?php
                  $str = $video->description;
                  if(strlen($str) > 99) {
                    echo substr($str, 0, 99). '...';
                  } else {
                    echo $str;
                  }
                ?>
              </p>
              <div class="video__details--dd d-flex justify-content-between">
                <p class="small text-muted video__details--is-date mb-0"><i class="fas fa-clock"></i>&nbsp; {{ $video->published_at }}</p>
                <p class="small text-muted video__details--is-duration mb-0">{{ $video->duration }}</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
    </div>
  </section>
@endsection

@section('scripts')
  <script>
    sr.reveal('.headul', {
      origin: 'left',
      distance: '3vw',
    });
  </script>
@endsection