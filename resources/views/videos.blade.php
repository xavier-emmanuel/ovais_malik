@extends('layouts.master')

@section('stylesheets')
@endsection

@section('content')
	<section class="videos">
    <div class="container">
      <h1 class="text-center">Videos</h1>
      <div class="headul"></div>

      <div class="video__wrapper">
        <div class="video__card">
          <div class="embed-responsive embed-responsive-16by9">
            <!-- NOTE! I added this parameter '?showinfo=0' after the video id to hide the information above. -->
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/4pgMFb_pO_k?showinfo=0" encrypted-media allowfullscreen></iframe>
          </div>
          <div class="video__details p-4">
            <h5 class="video__details--is-title">Title here</h5>
            <!-- NOTE! Video description should have an ellipsis when >= 100 characters, you can do this using laravel ternary operator. Check the example below, I used the example in native php, so convert it into laravel form. -->
            <p class="small text-muted video__details--is-description">
              <?php 
                $str = "Description Here Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi esse nobis aliquam deleniti! Est, officia. Ab autem magnam vero, quibusdam alias eos sequi quasi, adipisci, voluptatibus nihil at porro cumque?
                Placeat explicabo, fuga molestias quia odit maxime fugiat labore debitis. Deleniti, aliquam dignissimos ducimus debitis consectetur officia quaerat dicta, pariatur explicabo possimus corporis eligendi dolore eaque. Iusto nihil cumque placeat.
                Enim ipsam officiis itaque tenetur placeat doloribus deleniti amet vero consequuntur ipsa! Aut tenetur sed beatae iusto nam enim dolorum pariatur aspernatur natus! Sequi, enim voluptas perferendis ducimus quo incidunt.
                Dicta, et facere illum voluptas, error adipisci provident nihil voluptatum repellendus earum consequuntur. Eaque amet nostrum modi, illum dolor accusamus veritatis animi nulla asperiores possimus maxime repudiandae aliquam saepe exercitationem!
                Ipsum in deserunt sint a eveniet quam, delectus hic doloribus at, accusantium sequi accusamus tenetur. Nisi, deleniti unde quae minima tenetur asperiores fugit est reprehenderit culpa ea, eaque id amet!";
                //  Use the shorthand method of this condition, it's called ternary operator. ALWAYS use ternary operator for faster performance if possible. The shorter the code the better.
                if(strlen($str) > 99) {
                  echo substr($str, 0, 99). '...';
                } else {
                  echo $str;
                }
              ?>
            </p>
            <div class="video__details--dd d-flex justify-content-between">
              <p class="small text-muted video__details--is-date"><i class="fas fa-clock"></i>&nbsp; March 27, 2018</p>
              <p class="small text-muted video__details--is-duration">00:00</p>
            </div>
          </div>
        </div>
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