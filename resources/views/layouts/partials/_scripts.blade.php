<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/plugins/popper/popper.min.js') }}"></script>

<!-- Bootstrap JS -->
<script src="{{ asset('/plugins/bootstrap/bootstrap.min.js') }}"></script>

<!-- Scroll Reveal JS -->
<script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>

<script>
  $(document).ready(function() {
     //Check to see if the window is top if not then display button
    $(window).scroll(function(){
      if ($(this).scrollTop() > 150) {
        $('.scroll-to-top').fadeIn();
      } else {
        $('.scroll-to-top').fadeOut();
      }
    });

    //Click event to scroll to top
    $('.scroll-to-top').click(function(){
      $('html, body').animate({scrollTop : 0}, 800);
      return false;
    });
  });
</script>

@yield('scripts')