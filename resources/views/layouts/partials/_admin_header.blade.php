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
    .my-error-class {
      color: #b90504;
      border-color: #b90504;
    }
    label.my-error-class {
      font-size: 80%;
      font-weight: 400;
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
        <img class="o-admin__image--is-round" src="{{ asset(App::environment('production') ? '/public/img/avatar.svg' : '/img/avatar.svg') }}" alt="Profile">
        <a class="dropdown-toggle" id="admin-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="admin-dropdown">
          <a href="#" data-target="#admin-settings" data-toggle="modal" data-backdrop="static" class="dropdown-item"><i class="fas fa-cogs"></i>&nbsp; Settings</a>
          <a href="/auth/logout" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>&nbsp; Logout</a>
        </div>
      </div>
    </header>

    <div class="modal fade" id="admin-settings" tabindex="-1" role="dialog" aria-labelledby="adminSettings" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="loading-overlay" style="display: none;">
          <div class="lds-default">
            <div></div><div></div><div></div>
            <div></div><div></div><div></div>
            <div></div><div></div><div></div>
            <div></div><div></div><div></div>
          </div>
        </div>
        <div class="modal-content">
          <form id="frm-admin-settings" method="post" name="frm_admin_settings">
            {{ csrf_field() }}
            <div class="modal-header">
              <h5 class="modal-title">Account Settings</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="user_id" id="user-id" value="{{ Auth::user()->id }}">
              <div class="form-group">
                <label for="">Username:&nbsp;&nbsp; <i class="fas fa-question-circle form-info" data-toggle="popover" data-content="Feel free to change your username whenever you like. Just type in your desired username in the field below."></i></label>
                <input type="text" name="new_username" id="new-username" class="form-control" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="">New Password:&nbsp;&nbsp; <i class="fas fa-question-circle form-info" data-toggle="popover" data-content="Type in your desired password in the field below to change your account password."></i></label>
                <input type="password" name="new_password" id="new-password" class="form-control" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="">Re-type Password:</label>
                <input type="password" name="retype_password" id="retype-password" class="form-control" autocomplete="off">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">
                <i class="fas fa-times"></i>&nbsp; Cancel</button>
              <button type="submit" class="btn btn-info" id="btn-delete-logo">
                <i class="fas fa-check"></i>&nbsp; Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>