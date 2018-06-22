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
@endsection