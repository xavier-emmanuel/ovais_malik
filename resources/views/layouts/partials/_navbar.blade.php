  <header id="header" class="container">
    <div class="header__nav--is-top">
      <ul class="social-media__link">
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
        <li class="social-media__icon social-media__icon--youtube">
          <a href="#">
            <i class="fab fa-youtube"></i>
          </a>
        </li>
        <li class="social-media__icon social-media__icon--imdb">
          <a href="#">
            <i class="fab fa-imdb"></i>
          </a>
        </li>
      </ul>

      <ul class="contact">
        <li class="contact__list">
          <i class="fas fa-phone"></i>&nbsp;
          <a href="javascript:void(0);">
            <span>(805) 624-2020</span>
          </a>
        </li>
        <li class="contact__list">
          <i class="fas fa-envelope"></i>&nbsp;
          <a href="mailto:info@ovaismalik.com">
            <span>info@ovaismalik.com</span>
          </a>
        </li>
      </ul>
    </div>

    <nav class="header__nav--is-bottom navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="#">
        <img src="{{ asset('/img/logo.jpg') }}" alt="Ovais Malik Voiceover Logo">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navigation">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/gallery">Gallery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/videos-show">Videos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/blogs">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact</a>
          </li>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
            LOGIN
          </button>
        </ul>
      </div>
    </nav>
  </header>