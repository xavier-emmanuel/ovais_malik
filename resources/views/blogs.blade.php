@extends('layouts.master')

@section('stylesheets')
@endsection

@section('content')
	<section id="blog">
    <div class="container">
      <h1 class="text-center">Blogs</h1>
      <div class="headul"></div>
      <div class="box-wrapper">
        <div class="box">
          <div class="box-image">
            <div class="box-info">
              <span class="box-category">News</span>
            </div>

            <img src="https://picsum.photos/500/300/?image=1062" alt="" width="100%">

            <div class="box-overlay">
              <div class="box-overlay__content">
                <h4 class="box-overlay__title">
                  <a href="/blog-single">Popular Design News Of The Week: June 4, 2018 - June 10, 2018</a>
                </h4>
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

            <img src="https://picsum.photos/500/300/?image=1079" alt="" width="100%">

            <div class="box-overlay">
              <div class="box-overlay__content">
                <h4 class="box-overlay__title">
                  <a href="/blog-single">Popular Design News Of The Week: June 4, 2018 - June 10, 2018</a>
                </h4>
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

            <img src="https://picsum.photos/500/300/?image=1" alt="" width="100%">

            <div class="box-overlay">
              <div class="box-overlay__content">
                <h4 class="box-overlay__title">
                  <a href="/blog-single">Popular Design News Of The Week: June 4, 2018 - June 10, 2018</a>
                </h4>
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

            <img src="https://picsum.photos/500/300/?image=1028" alt="" width="100%">

            <div class="box-overlay">
              <div class="box-overlay__content">
                <h4 class="box-overlay__title">
                  <a href="/blog-single">Popular Design News Of The Week: June 4, 2018 - June 10, 2018</a>
                </h4>
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

            <img src="https://picsum.photos/500/300/?image=79" alt="" width="100%">

            <div class="box-overlay">
              <div class="box-overlay__content">
                <h4 class="box-overlay__title">
                  <a href="#">Popular Design News Of The Week: June 4, 2018 - June 10, 2018</a>
                </h4>
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
                <h4 class="box-overlay__title">
                  <a href="/blog-single">Popular Design News Of The Week: June 4, 2018 - June 10, 2018</a>
                </h4>
                <p class="small">Written by
                  <a href="#">Ovais Malik</a> on June 15, 2018
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <nav id="pagination">
        <ul class="pagination justify-content-center">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">1</a>
          </li>
          <li class="page-item active">
            <a class="page-link" href="#">2</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">3</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </section>
@endsection

@section('scripts')
  <script>
    sr.reveal('.headul', {
      origin: 'left',
      distance: '500px',
    });

    sr.reveal('.box')
  </script>
@endsection