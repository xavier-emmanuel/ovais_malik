<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="icon" href="{{ asset(App::environment('production') ? '/public/img/favicon.ico' : '/img/favicon.ico') }}" sizes="16x16">
  <link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/plugins/bootstrap/bootstrap.min.css' : '/plugins/bootstrap/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/plugins/fontawesome/css/fontawesome-all.min.css' : '/plugins/fontawesome/css/fontawesome-all.min.css') }}">
  <link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/plugins/datatable/dataTables.bootstrap4.min.css' : '/plugins/datatable/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/plugins/toast-master/css/jquery.toast.css' : '/plugins/toast-master/css/jquery.toast.css') }}">
  <link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/css/main.min.css' : '/css/main.min.css') }}">

  <style>
    img:not([src]):not([srcset]) {
			visibility: hidden;
		}
  </style>

  @yield('stylesheets')

  <title>Ovais Malik Voiceover | Multilingual Voice Talent - {{ $page }}</title>
</head>

<body class="admin-body">
  <div class="admin-wrapper">
    <header class="admin-header">
      <span class="hide">
        <i class="fas fa-arrow-circle-left"></i>
      </span>

      <div class="dropdown o-admin__wrapper">
        <img class="o-admin__image--is-round" src="http://via.placeholder.com/40x40" alt="Profile">
        <a class="dropdown-toggle" id="admin-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Ovais Malik
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="admin-dropdown">
          <a href="#" class="dropdown-item"><i class="fas fa-cogs"></i>&nbsp; Settings</a>
          <a href="/auth/logout" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>&nbsp; Logout</a>
        </div>
      </div>
    </header>