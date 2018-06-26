@extends('layouts.master')

@section('stylesheets')
@endsection

@section('content')
	<section id="blog-single">
    <div class="container">
      <div class="blog-wrapper">
        <div class="blog-header">
          <div class="blog-info">
            <span class="blog-category">{{ $data->categories->name }}</span>
            @foreach($tags as $tag)
            <span class="blog-tags small">
              <a href="#">{{ $tag }}</a>
            </span>
            @endforeach
          </div>

          <img src="/{{ $data->image }}" alt="" width="100%">

          <div class="blog-overlay">
            <h2>
             {{ $data->title }}
            </h2>
            <div class="author-info">
              <p class="small">Written by
                <a href="#">Ovais Malik</a> on {{ $data->created_at->format('F d, Y h:i:s A') }}
              </p>

              <ul class="social-sharer social-media__link">
                <li class="social-media__icon social-media__icon--facebook">
                  <a href="#">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                </li>
                <li class="social-media__icon social-media__icon--twitter">
                  <a href="#">
                    <i class="fab fa-twitter"></i>
                  </a>
                </li>
                <li class="social-media__icon social-media__icon--linkedin">
                  <a href="#">
                    <i class="fab fa-linkedin-in"></i>
                  </a>
                </li>
                <li class="social-media__icon social-media__icon--google">
                  <a href="#">
                    <i class="fab fa-google-plus-g"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="blog-content-wrapper">
          <div class="blog-content">
            <p class="text-justify">{!! $data->content !!}</p>

            <img src="/{{ $data->image }}" alt="" width="100%">

            <div class="blog-related">
              <h5>Related Posts</h5>
              <div class="box-wrapper">
                <div class="box">
                  <div class="box-image">
                    <div class="box-info">
                      <span class="box-category">News</span>
                    </div>

                    <img src="https://picsum.photos/500/300/?image=27" alt="" width="100%">

                    <div class="box-overlay">
                      <div class="box-overlay__content">
                        <h6 class="box-overlay__title">
                          <a href="#">Popular Design News Of The Week: June 4, 2018 - June 10, 2018</a>
                        </h6>
                        <p class="small">Written by
                          <a href="#">Ovais Malik</a> on June 15, 2018
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="box">
                  <div class="box-image">
                    <div class="box-info">
                      <span class="box-category">News</span>
                    </div>

                    <img src="https://picsum.photos/500/300/?image=27" alt="" width="100%">

                    <div class="box-overlay">
                      <div class="box-overlay__content">
                        <h6 class="box-overlay__title">
                          <a href="#">Popular Design News Of The Week: June 4, 2018 - June 10, 2018</a>
                        </h6>
                        <p class="small">Written by
                          <a href="#">Ovais Malik</a> on June 15, 2018
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="box">
                  <div class="box-image">
                    <div class="box-info">
                      <span class="box-category">News</span>
                    </div>

                    <img src="https://picsum.photos/500/300/?image=27" alt="" width="100%">

                    <div class="box-overlay">
                      <div class="box-overlay__content">
                        <h6 class="box-overlay__title">
                          <a href="#">Popular Design News Of The Week: June 4, 2018 - June 10, 2018</a>
                        </h6>
                        <p class="small">Written by
                          <a href="#">Ovais Malik</a> on June 15, 2018
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="blog-comments">
              <p>Comments goes here...</p>
            </div>
          </div>

          <div class="blog-ads">
            <a href="https://placeholder.com" style="margin-bottom: 20px;">
              <img src="http://via.placeholder.com/310x250">
            </a>

            <a href="https://placeholder.com" style="margin-bottom: 20px;">
              <img src="http://via.placeholder.com/310x800">
            </a>

            <a href="https://placeholder.com">
              <img src="http://via.placeholder.com/310x650">
            </a>

          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('scripts')
@endsection