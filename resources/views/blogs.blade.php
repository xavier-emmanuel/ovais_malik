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

            <img class="lazyload" src="{{ asset(App::environment('production') ? 'public/uploads/admin-blogs/thumbnail/'.$blog->image : 'uploads/admin-blogs/thumbnail/'.$blog->image) }}" data-srcset="{{ asset(App::environment('production') ? 'public/uploads/admin-blogs/extra-small/'.$blog->image : 'uploads/admin-blogs/extra-small/'.$blog->image) }} 250w, {{ asset(App::environment('production') ? 'public/uploads/admin-blogs/small/'.$blog->image : 'uploads/admin-blogs/small/'.$blog->image) }} 540w, {{ asset(App::environment('production') ? 'public/uploads/admin-blogs/medium/'.$blog->image : 'uploads/admin-blogs/medium/'.$blog->image) }} 720w, {{ asset(App::environment('production') ? 'public/uploads/admin-blogs/original/'.$blog->image : 'uploads/admin-blogs/original/'.$blog->image) }} 1140w" sizes="100vw" alt="{{ $blog->image}}" width="100%">

            <div class="box-overlay">
              <div class="box-overlay__content">
                <h4 class="box-overlay__title">
                  <a href="/blogs/{{ $blog->slug }}">{{ $blog->title }}</a>
                </h4>
                <p class="small">Written by
                  <a href="/about">Ovais Malik</a> on {{ $blog->created_at->format('F d, Y') }}
                </p>
                <i class="fas fa-comments"></i>&nbsp; <a href="/blogs/{{ $blog->slug }}#disqus_thread">Comments</a>
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
  <script id="dsq-count-scr" src="//ovaismalik.disqus.com/count.js" async></script>
  <script>
    sr.reveal('.headul', {
      origin: 'left',
      distance: '3vw',
    });

    sr.reveal('.box')
  </script>
@endsection