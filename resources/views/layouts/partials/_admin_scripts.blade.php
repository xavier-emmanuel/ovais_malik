<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/plugins/popper/popper.min.js') }}"></script>

<!-- Bootstrap JS -->
<script src="{{ asset('/plugins/bootstrap/bootstrap.min.js') }}"></script>

<!-- Datatable JS -->
<script src="{{ asset('/plugins/datatable/dataTables.min.js') }}"></script>
<script src="{{ asset('/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('/js/app.js') }}"></script>

@yield('scripts')

<script>
  $(document).ready(function () {
    $('#myTable').DataTable();
  });
</script>