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
              <!-- NOTE! I added this parameter '?showinfo=0' after the video id to hide the information above. -->
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $video->link }}?showinfo=0" encrypted-media allowfullscreen></iframe>
            </div>
            <div class="video__details p-4">
              <h5 class="video__details--is-title">{{ $video->title }}</h5>
              <!-- NOTE! Video description should have an ellipsis when >= 100 characters, you can do this using laravel ternary operator. Check the example below, I used the example in native php, so convert it into laravel form. -->
              <p class="small text-muted video__details--is-description">
                <?php 
                  $str = $video->description;
                  //  Use the shorthand method of this condition, it's called ternary operator. ALWAYS use ternary operator for faster performance if possible. The shorter the code the better.
                  if(strlen($str) > 99) {
                    echo substr($str, 0, 99). '...';
                  } else {
                    echo $str;
                  }
                ?>
              </p>
              <div class="video__details--dd d-flex justify-content-between">
                <p class="small text-muted video__details--is-date"><i class="fas fa-clock"></i>&nbsp; {{ $video->published_at }}</p>
                <p class="small text-muted video__details--is-duration">{{ $video->duration }}</p>
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