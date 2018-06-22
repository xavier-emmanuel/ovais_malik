<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="{{ asset('/img/favicon.ico') }}" sizes="16x16">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('/plugins/bootstrap/bootstrap.min.css') }}">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/plugins/fontawesome/css/fontawesome-all.min.css') }}">

  <!-- Bootstrap 4 DataTable -->
  <link rel="stylesheet" href="{{ asset('/plugins/datatable/dataTables.bootstrap4.min.css') }}">

  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('/plugins/toast-master/css/jquery.toast.css') }}">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('/css/main.min.css') }}">

  @yield('stylesheets')

  <title>Ovais Malik Voiceover | Multilingual Voice Talent - {{ $page }}</title>
</head>

<body class="admin-body">
  <div class="admin-wrapper">
    <header class="admin-header">
      <span class="hide">
        <i class="fas fa-arrow-circle-left"></i>
      </span>

      <div class="admin-name">
        <a href="#" data-toggle="modal" data-target="#logout-modal">Logout</a>
      </div>
    </header>

    <!-- Modal Logout -->
    <div class="modal fade" id="logout-modal" tabindex="-1" role="dialog" aria-labelledby="logoutModalTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div>
              <p><i class="fas fa-question-circle" style="font-size: 2rem;"></i>&nbsp;&nbsp;&nbsp; Are you sure you want to logout?</p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              <i class="fas fa-times"></i>&nbsp; No</button>
            <a href="/auth/logout"><button type="button" class="btn btn-info">
              <i class="fas fa-check"></i>&nbsp; Yes</button></a>
          </div>
        </div>
      </div>
    </div>