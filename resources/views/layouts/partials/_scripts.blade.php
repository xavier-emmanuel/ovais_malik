<script src="{{ asset(App::environment('production') ? '/public/plugins/jquery/jquery.min.js' : '/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset(App::environment('production') ? '/public/plugins/popper/popper.min.js' : '/plugins/popper/popper.min.js') }}"></script>
<script src="{{ asset(App::environment('production') ? '/public/plugins/bootstrap/bootstrap.min.js' : '/plugins/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset(App::environment('production') ? '/public/plugins/jquery-validation/dist/jquery.validate.js' : '/plugins/jquery-validation/dist/jquery.validate.js') }}"></script>
<script src="{{ asset(App::environment('production') ? '/public/plugins/scrollreveal/scrollreveal.min.js' : '/plugins/scrollreveal/scrollreveal.min.js') }}"></script>
<script src="{{ asset(App::environment('production') ? '/public/plugins/lazyload/lazyload.js' : '/plugins/lazyload/lazyload.js') }}"></script>
<script src="{{ asset(App::environment('production') ? '/public/js/pages/login.js' : '/js/pages/login.js') }}"></script>
<script>
  new LazyLoad();
  window.sr = ScrollReveal({
    mobile: true,
    opacity: 0,
    scale: 1,
    duration: 1000
  });

  sr.reveal('h1.text-center', {
    origin: 'right',
    distance: '3vw',
  });

  $(document).ready(function() {
    $(window).scroll(function(){
      if ($(this).scrollTop() > 150) {
        $('.scroll-to-top').fadeIn();
      } else {
        $('.scroll-to-top').fadeOut();
      }
    });
    $('.scroll-to-top').click(function(){
      $('html, body').animate({scrollTop : 0}, 800);
      return false;
    });
  });
</script>
@yield('scripts')