<aside class="admin-aside" id="nav">
  <div class="admin-logo text-center">
    <img src="{{ asset(App::environment('production') ? '/public/img/logo.jpg' : '/img/logo.jpg') }}" alt="Ovais Malik Voiceover Logo">
  </div>
  <div class="admin-navigation">
    <span class="navigation-title text-muted small">Navigation</span>
    <nav>
      <ul>
        <li>
          <a href="#">
            <i class="fas fa-tachometer-alt"></i>&nbsp;&nbsp; Dashboard
          </a>
        </li>
        <li class="active">
          <a href="/admin-blog">
            <i class="fab fa-blogger-b"></i>&nbsp;&nbsp; Blog
          </a>
        </li>
        <li>
          <a href="/admin-audio">
            <i class="fas fa-headphones"></i>&nbsp;&nbsp; Audio
          </a>
        </li>
        <li>
          <a href="/admin-video">
            <i class="fas fa-video"></i>&nbsp;&nbsp; Video
          </a>
        </li>
        <li>
          <a href="/admin-gallery">
            <i class="fas fa-images"></i>&nbsp;&nbsp; Gallery
          </a>
        </li>
        <li>
          <a href="/admin-category">
            <i class="fas fa-list-ol"></i>&nbsp;&nbsp; Category
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>