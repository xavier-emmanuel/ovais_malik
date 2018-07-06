<?php

namespace App\Http\Controllers;

use Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Http\Controllers\Controller;
use App\User;


class LoginController extends Controller
{
  public function login(Request $request)
  {
    if (Auth::attempt(['username' => $request->login_username, 'password' => $request->login_password])) {
        return redirect()->intended('/admin-blog');
    } else {
    		return back()->withErrors(['Invalid login credentials!']);
    }
  }

  public function logout ()
  {
  	Auth::logout();
    return redirect('/');
  }
}
