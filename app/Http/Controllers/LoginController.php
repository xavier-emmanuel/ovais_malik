<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
  public function login(Request $request)
  {
      $credentials = $request->only('username', 'password');

      if (Auth::attempt(['username' => $request->login_username, 'password' => $request->login_password])) {
          return redirect()->intended('/admin-video');
      } else {
          return redirect('/');
      }
  }

  public function logout ()
  {
  	Auth::logout();
    return redirect('/');
  }
}
