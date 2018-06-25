@extends('layouts.master')

@section('stylesheets')
@endsection

@section('content')
	<section class="videos">
    <div class="container">
      <h1 class="text-center">Videos</h1>
      <div class="headul"></div>

      <div class="row" id="video-section">
      </div>

    </div>
  </section>
@endsection

@section('scripts')
  <script src="{{ asset(App::environment('production') ? '/public/js/pages/videos.js' : '/js/pages/videos.js') }}"></script>
  <script>
    sr.reveal('.headul', {
      origin: 'left',
      distance: '3vw',
    });
  </script>
@endsection