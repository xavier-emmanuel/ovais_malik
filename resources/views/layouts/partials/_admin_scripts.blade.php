<script src="{{ asset(App::environment('production') ? '/public/plugins/jquery/jquery.min.js' : '/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset(App::environment('production') ? '/public/plugins/popper/popper.min.js' : '/plugins/popper/popper.min.js') }}"></script>
<script src="{{ asset(App::environment('production') ? '/public/plugins/bootstrap/bootstrap.min.js' : '/plugins/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset(App::environment('production') ? '/public/plugins/datatable/dataTables.min.js' : '/plugins/datatable/dataTables.min.js') }}"></script>
<script src="{{ asset(App::environment('production') ? '/public/plugins/datatable/dataTables.bootstrap4.min.js' : '/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset(App::environment('production') ? '/public/plugins/toast-master/js/jquery.toast.js' : '/plugins/toast-master/js/jquery.toast.js') }}"></script>
<script src="{{ asset(App::environment('production') ? '/public/plugins/jquery-validation/dist/jquery.validate.js' : '/plugins/jquery-validation/dist/jquery.validate.js') }}"></script>
<script src="{{ asset(App::environment('production') ? '/public/plugins/lazyload/lazyload.js' : '/plugins/lazyload/lazyload.js') }}"></script>
<script src="{{ asset(App::environment('production') ? '/public/js/app.js' : '/js/app.js') }}"></script>
<script>
  new LazyLoad();
</script>
@yield('scripts')