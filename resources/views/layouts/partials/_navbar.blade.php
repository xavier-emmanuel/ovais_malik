  <header id="header" class="container">
    <div class="header__nav--is-top">
      <ul class="social-media__link">
        <li class="social-media__icon social-media__icon--facebook">
          <a href="https://www.facebook.com/ovaismalikvoiceover/" target="_blank">
            <i class="fab fa-facebook-f"></i>
          </a>
        </li>
        <li class="social-media__icon social-media__icon--twitter">
          <a href="https://twitter.com/OvaisMalikVO" target="_blank">
            <i class="fab fa-twitter"></i>
          </a>
        </li>
        <li class="social-media__icon social-media__icon--linkedin">
          <a href="https://www.linkedin.com/in/ovaismalik/" target="_blank">
            <i class="fab fa-linkedin-in"></i>
          </a>
        </li>
        <li class="social-media__icon social-media__icon--youtube">
          <a href="https://www.youtube.com/user/drumgy8" target="_blank">
            <i class="fab fa-youtube"></i>
          </a>
        </li>
        <li class="social-media__icon social-media__icon--imdb">
          <a href="#" target="_blank">
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
        <img src="{{ asset(App::environment('production') ? '/public/img/logo.jpg' : '/img/logo.jpg') }}" alt="Ovais Malik Voiceover Logo">
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
            <a class="nav-link" href="/blogs">Blogs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/contact">Contact</a>
          </li>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#login-modal" id="login-button">
            LOGIN
          </button>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Modal -->
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content text-center">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/auth/login" method="POST" id="frm-login" name="frm_login">
          {{ csrf_field() }}
          <div class="modal-body">
            <img src="{{ asset(App::environment('production') ? '/public/img/logo.jpg' : '/img/logo.jpg') }}" alt="Ovais Malik Voiceover Logo" width="100px">
            <br>
            <br>
            <br>
            <div class="form-group text-left">
              <label for="login-username">Username:</label>
              <input type="text" class="form-control" id="login-username" name="login_username" autocomplete="off">
            </div>
            <div class="form-group text-left">
              <label for="login-password">Password:</label>
              <input type="password" class="form-control" id="login-password" name="login_password" autocomplete="off">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-block">LOGIN</button>
          </div>
        </form>
      </div>
    </div>
  </div>