<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate;

class AdminPagesController extends Controller
{
	public function __construct()
	{
	    $this->middleware('auth');
	}

  public function adminVideo()
	  {
	    return view('admin_video')->with(array('page' => 'Videos | Admin'));
	  }
}
