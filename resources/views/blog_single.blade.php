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
              @if(empty($tag))
              @else
                <span class="blog-tags small">
                  <a href="#">{{ $tag }}</a>
                </span>
              @endif
            @endforeach
          </div>

          <img class="lazyload" src="{{ asset(App::environment('production') ? 'public/uploads/admin-blogs/thumbnail/'.$data->image : 'uploads/admin-blogs/thumbnail/'.$data->image) }}" data-srcset="{{ asset(App::environment('production') ? 'public/uploads/admin-blogs/extra-small/'.$data->image : 'uploads/admin-blogs/extra-small/'.$data->image) }} 250w, {{ asset(App::environment('production') ? 'public/uploads/admin-blogs/small/'.$data->image : 'uploads/admin-blogs/small/'.$data->image) }} 540w, {{ asset(App::environment('production') ? 'public/uploads/admin-blogs/medium/'.$data->image : 'uploads/admin-blogs/medium/'.$data->image) }} 720w, {{ asset(App::environment('production') ? 'public/uploads/admin-blogs/original/'.$data->image : 'uploads/admin-blogs/original/'.$data->image) }} 1140w" sizes="100vw" alt="{{ $data->title}}" width="100%">

          <div class="blog-overlay">
            <h2>
             {{ $data->title }}
            </h2>
            <div class="author-info">
              <p class="small w-100">Written by
                <a href="/about">Ovais Malik</a> on {{ $data->created_at->format('F d, Y') }}
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
            {!! $data->content !!}
            @if($related_post->count() > 0)
            <div class="blog-related my-4 pt-2">
              <h5>Related Posts</h5>
              <div class="blog-related__wrapper">
                @foreach($related_post as $post)
                <div class="blog-related__card">
                  <div class="blog-related__image">
                    <div class="blog-related__card--info">
                      <span class="blog-related__card--category">{{ $post->categories->name }}</span>
                    </div>

                    <img class="lazyload" src="{{ asset(App::environment('production') ? 'public/uploads/admin-blogs/thumbnail/'.$post->image : 'uploads/admin-blogs/thumbnail/'.$post->image) }}" data-srcset="{{ asset(App::environment('production') ? 'public/uploads/admin-blogs/extra-small/'.$post->image : 'uploads/admin-blogs/extra-small/'.$post->image) }} 250w, {{ asset(App::environment('production') ? 'public/uploads/admin-blogs/small/'.$post->image : 'uploads/admin-blogs/small/'.$post->image) }} 540w, {{ asset(App::environment('production') ? 'public/uploads/admin-blogs/medium/'.$post->image : 'uploads/admin-blogs/medium/'.$post->image) }} 720w, {{ asset(App::environment('production') ? 'public/uploads/admin-blogs/original/'.$post->image : 'uploads/admin-blogs/original/'.$post->image) }} 1140w" sizes="100vw" alt="{{ $post->title }}" width="100%">

                    <div class="box-overlay">
                      <div class="box-overlay__content">
                        <h6 class="box-overlay__title">
                          <a href="/blogs/{{ $post->slug }}">{{ $post->title }}</a>
                        </h6>
                        <p class="small mb-0">Written by
                          <a href="#">Ovais Malik</a> on {{ $post->created_at->format('F d, Y') }}
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
            @endif

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
              @if($latest_post->count() > 0)
              <div class="side-ads__header">
                <p class="ads-title">Latest Posts</p>
                <hr class="headul">
              </div>
              <div class="latest-posts">
                <ul>
                  @foreach($latest_post as $post)
                  <li class="mb-3" title="{{ $post->title }}">
                    <a href="/blogs/{{ $post->slug }}" class="latest-post__link">
                      <img src="{{ asset(App::environment('production') ? 'public/uploads/admin-blogs/thumbnail/'.$post->image : 'uploads/admin-blogs/thumbnail/'.$post->image) }}" alt="{{ $post->title }}" width="50px" height="50px">
                      <div class="ads-info pl-2">
                        <p class="latest-post__title mb-0 pl-0 font-weight-bold">{{ $post->title }}</p>
                        <p class="small text-muted mb-0 mt-1"><i class="fas fa-clock"></i>&nbsp; {{ $post->created_at->format('F d, Y') }}</p>
                      </div>
                    </a>
                  </li>
                  @endforeach
                </ul>
              </div>
              @endif
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