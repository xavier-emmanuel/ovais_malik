@extends('layouts.master')

@section('stylesheets')
@endsection

@section('content')
	<section id="blog">
    <div class="container">
      <h1 class="text-center">Blogs</h1>
      <div class="headul"></div>
      <div class="box-wrapper">
        @foreach($data as $blog)
        <div class="box">
          <div class="box-image">
            <div class="box-info">
              <span class="box-category">{{ $blog->categories->name }}</span>
            </div>

            <img src="{{ $blog->image }}" alt="" width="100%">

            <div class="box-overlay">
              <div class="box-overlay__content">
                <h4 class="box-overlay__title">
                  <a href="/blog-single">{{ $blog->title }}</a>
                </h4>
                <p class="small">Written by
                  <a href="#">Ovais Malik</a> on {{ $blog->created_at->format('F d, Y h:i:s A') }}
                </p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      {{ $data->links() }}
    </div>
  </section>
@endsection

@section('scripts')
  <script>
    sr.reveal('.headul', {
      origin: 'left',
      distance: '3vw',
    });

    sr.reveal('.box')
  </script>
@endsection