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
  <script src="{{ asset('/js/pages/videos.js') }}"></script>
  <script>
    window.sr = ScrollReveal({
      mobile: true,
      opacity: 0,
      scale: 1,
      duration: 1000
    });

    sr.reveal('h1.text-center', {
      origin: 'right',
      distance: '500px',
    });

    sr.reveal('.headul', {
      origin: 'left',
      distance: '500px',
    });
  </script>
@endsection