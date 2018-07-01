@extends('layouts.master')

@section('stylesheets')
  <style>
      .fb_iframe_widget iframe {
          margin-top: -4px !important;
      }
  </style>
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

          <img class="lazyload" src="{{ asset(App::environment('production') ? 'public/uploads/admin-blogs/thumbnail/'.$data->image : 'uploads/admin-blogs/thumbnail/'.$data->image) }}" data-src="{{ asset(App::environment('production') ? 'public/uploads/admin-blogs/original/'.$data->image : 'uploads/admin-blogs/original/'.$data->image) }}" alt="" width="100%">

          <div class="blog-overlay">
            <h2>
             {{ $data->title }}
            </h2>
            <div class="author-info">
              <p class="small">Written by
                <a href="#">Ovais Malik</a> on {{ $data->created_at->format('F d, Y') }}
              </p>

              <ul class="social-sharer social-media__link">
                <li class="social-media__icon">
                  <div title="Click to share on Facebook" class="fb-share-button" data-href="{{ url()->full() }}" data-layout="button" data-size="small" data-mobile-iframe="true">
                      <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->full() }}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a>
                  </div>
                </li>
                <li class="social-media__icon">
                  <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="small" data-related="" data-show-count="true" title="Click to share on Twitter">Tweet</a>
                  <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </li>
                <li class="social-media__icon">
                  <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
                  <script type="IN/Share" data-url="{{ url()->full() }}"></script>
                </li>
                <li class="social-media__icon">
                  <a class="g-plus" data-href="{{ url()->full() }}" data-action="share" data-annotation="none" data-height="20" title="Click to share on Google Plus"></a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="blog-content-wrapper">
          <div class="blog-content">
            <p class="text-justify">{!! $data->content !!}</p>
            <img class="lazyload" src="{{ asset(App::environment('production') ? 'public/uploads/admin-blogs/thumbnail/'.$data->image : 'uploads/admin-blogs/thumbnail/'.$data->image) }}" data-src="{{ asset(App::environment('production') ? 'public/uploads/admin-blogs/original/'.$data->image : 'uploads/admin-blogs/original/'.$data->image) }}" alt="" width="100%">

            <div class="blog-related my-4 pt-2">
              <h5>Related Posts</h5>
              <div class="blog-related__wrapper">
                <div class="blog-related__card">
                  <div class="blog-related__image">
                    <div class="blog-related__card--info">
                      <span class="blog-related__card--category">News</span>
                    </div>

                    <img class="lazyload" src="https://picsum.photos/12/8/?image=27" data-src="https://picsum.photos/500/300/?image=27" alt="" width="100%">

                    <div class="box-overlay">
                      <div class="box-overlay__content">
                        <h6 class="box-overlay__title">
                          <a href="#">Popular Design News Of The Week: June 4, 2018 - June 10, 2018</a>
                        </h6>
                        <p class="small mb-0">Written by
                          <a href="#">Ovais Malik</a> on June 15, 2018
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="blog-related__card">
                  <div class="blog-related__image">
                    <div class="blog-related__card--info">
                      <span class="blog-related__card--category">News</span>
                    </div>

                    <img class="lazyload" src="https://picsum.photos/12/8/?image=27" data-src="https://picsum.photos/500/300/?image=27" alt="" width="100%">

                    <div class="box-overlay">
                      <div class="box-overlay__content">
                        <h6 class="box-overlay__title">
                          <a href="#">Popular Design News Of The Week: June 4, 2018 - June 10, 2018</a>
                        </h6>
                        <p class="small mb-0">Written by
                          <a href="#">Ovais Malik</a> on June 15, 2018
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="blog-related__card">
                  <div class="blog-related__image">
                    <div class="blog-related__card--info">
                      <span class="blog-related__card--category">News</span>
                    </div>

                    <img class="lazyload" src="https://picsum.photos/12/8/?image=27" data-src="https://picsum.photos/500/300/?image=27" alt="" width="100%">

                    <div class="box-overlay">
                      <div class="box-overlay__content">
                        <h6 class="box-overlay__title">
                          <a href="#">Popular Design News Of The Week: June 4, 2018 - June 10, 2018</a>
                        </h6>
                        <p class="small mb-0">Written by
                          <a href="#">Ovais Malik</a> on June 15, 2018
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="blog-comments" id="disqus_thread">
            </div>
          </div>

          <div class="blog-ads pt-3">
            <div class="side-ads mb-3">
              <div class="side-ads__header">
                <p class="ads-title">Connect with me on Facebook</p>
                <hr class="headul">
              </div>
              <div class="fb-page" data-href="https://www.facebook.com/ovaismalikvoiceover/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-width="270"><blockquote cite="https://www.facebook.com/ovaismalikvoiceover/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/ovaismalikvoiceover/">Ovais Malik Voiceover</a></blockquote></div>
            </div>
            <div class="side-ads mb-3">
              <div class="side-ads__header">
                <p class="ads-title">Latest Posts</p>
                <hr class="headul">
              </div>
              <div class="latest-posts">
                <ul>
                  <li class="mb-3" title="Lorem Ipsum Maalsum addasdasdasdasdas">
                    <a href="#" class="latest-post__link">
                      <img class="lazyload" src="{{ asset(App::environment('production') ? '/public/uploads/admin-blogs/thumbnail/1530164410abstract-beautiful-bokeh-1179724.jpg' : '/uploads/admin-blogs/thumbnail/1530164410abstract-beautiful-bokeh-1179724.jpg') }}" data-src="{{ asset(App::environment('production') ? '/public/uploads/admin-blogs/original/1530164410abstract-beautiful-bokeh-1179724.jpg' : '/uploads/admin-blogs/original/1530164410abstract-beautiful-bokeh-1179724.jpg') }}" alt="" width="50px" height="50px">
                      <div class="ads-info pl-2">
                        <p class="latest-post__title mb-0 pl-0 font-weight-bold">Lorem Ipsum Maalsum addasdasdasdasdas</p>
                        <p class="small text-muted mb-0 mt-1"><i class="fas fa-clock"></i>&nbsp; March 20, 2018</p>
                      </div>
                    </a>
                  </li>
                  <li class="mb-3" title="Lorem Ipsum Maalsum addasdasdasdasdas">
                    <a href="#" class="latest-post__link">
                      <img class="lazyload" src="{{ asset(App::environment('production') ? '/public/uploads/admin-blogs/thumbnail/1530164410abstract-beautiful-bokeh-1179724.jpg' : '/uploads/admin-blogs/thumbnail/1530164410abstract-beautiful-bokeh-1179724.jpg') }}" data-src="{{ asset(App::environment('production') ? '/public/uploads/admin-blogs/original/1530164410abstract-beautiful-bokeh-1179724.jpg' : '/uploads/admin-blogs/original/1530164410abstract-beautiful-bokeh-1179724.jpg') }}" alt="" width="50px" height="50px">
                      <div class="ads-info pl-2">
                        <p class="latest-post__title mb-0 pl-0 font-weight-bold">Lorem Ipsum Maalsum addasdasdasdasdas</p>
                        <p class="small text-muted mb-0 mt-1"><i class="fas fa-clock"></i>&nbsp; March 20, 2018</p>
                      </div>
                    </a>
                  </li>
                  <li class="mb-3" title="Lorem Ipsum Maalsum addasdasdasdasdas">
                    <a href="#" class="latest-post__link">
                      <img class="lazyload" src="{{ asset(App::environment('production') ? '/public/uploads/admin-blogs/thumbnail/1530164410abstract-beautiful-bokeh-1179724.jpg' : '/uploads/admin-blogs/thumbnail/1530164410abstract-beautiful-bokeh-1179724.jpg') }}" data-src="{{ asset(App::environment('production') ? '/public/uploads/admin-blogs/original/1530164410abstract-beautiful-bokeh-1179724.jpg' : '/uploads/admin-blogs/original/1530164410abstract-beautiful-bokeh-1179724.jpg') }}" alt="" width="50px" height="50px">
                      <div class="ads-info pl-2">
                        <p class="latest-post__title mb-0 pl-0 font-weight-bold">Lorem Ipsum Maalsum addasdasdasdasdas</p>
                        <p class="small text-muted mb-0 mt-1"><i class="fas fa-clock"></i>&nbsp; March 20, 2018</p>
                      </div>
                    </a>
                  </li>
                  <li class="mb-3" title="Lorem Ipsum Maalsum addasdasdasdasdas">
                    <a href="#" class="latest-post__link">
                      <img class="lazyload" src="{{ asset(App::environment('production') ? '/public/uploads/admin-blogs/thumbnail/1530164410abstract-beautiful-bokeh-1179724.jpg' : '/uploads/admin-blogs/thumbnail/1530164410abstract-beautiful-bokeh-1179724.jpg') }}" data-src="{{ asset(App::environment('production') ? '/public/uploads/admin-blogs/original/1530164410abstract-beautiful-bokeh-1179724.jpg' : '/uploads/admin-blogs/original/1530164410abstract-beautiful-bokeh-1179724.jpg') }}" alt="" width="50px" height="50px">
                      <div class="ads-info pl-2">
                        <p class="latest-post__title mb-0 pl-0 font-weight-bold">Lorem Ipsum Maalsum addasdasdasdasdas</p>
                        <p class="small text-muted mb-0 mt-1"><i class="fas fa-clock"></i>&nbsp; March 20, 2018</p>
                      </div>
                    </a>
                  </li>
                  <li class="mb-3" title="Lorem Ipsum Maalsum addasdasdasdasdas">
                    <a href="#" class="latest-post__link">
                      <img class="lazyload" src="{{ asset(App::environment('production') ? '/public/uploads/admin-blogs/thumbnail/1530164410abstract-beautiful-bokeh-1179724.jpg' : '/uploads/admin-blogs/thumbnail/1530164410abstract-beautiful-bokeh-1179724.jpg') }}" data-src="{{ asset(App::environment('production') ? '/public/uploads/admin-blogs/original/1530164410abstract-beautiful-bokeh-1179724.jpg' : '/uploads/admin-blogs/original/1530164410abstract-beautiful-bokeh-1179724.jpg') }}" alt="" width="50px" height="50px">
                      <div class="ads-info pl-2">
                        <p class="latest-post__title mb-0 pl-0 font-weight-bold">Lorem Ipsum Maalsum addasdasdasdasdas</p>
                        <p class="small text-muted mb-0 mt-1"><i class="fas fa-clock"></i>&nbsp; March 20, 2018</p>
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('scripts')
  <script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

    var disqus_config = function () {
      this.page.url = '{{ url()->full() }}';
      this.page.identifier = '{{ url()->full() }}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };

    (function() { // DON'T EDIT BELOW THIS LINE
      var d = document, s = d.createElement('script');
      s.src = 'https://ovaismalik.disqus.com/embed.js';
      s.setAttribute('data-timestamp', +new Date());
      (d.head || d.body).appendChild(s);
    })();
  </script>
  <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
  <script id="dsq-count-scr" src="//ovaismalik.disqus.com/count.js" async></script>
@endsection