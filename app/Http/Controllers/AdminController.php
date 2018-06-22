<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function adminBlog() {
		return view('admin_blog')->with(array('page' => 'Blog'));
	}

	public function createBlog() {
		return view('create_blog')->with(array('page' => 'Create Blog'));
	}

	public function adminCategory() {
		return view('admin_category')->with(array('page' => 'Category'));
	}

	public function adminAudio() {
		return view('admin_audio')->with(array('page' => 'Audio'));
	}


}
