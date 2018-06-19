<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     return view('index');
    }

    public function about()
    {
        return view('about');
    }

    public function gallery()
    {
        return view('gallery');
    }

    public function videos()
    {
        return view('videos');
    }

    public function blogs()
    {
        return view('blogs');
    }

    public function contact()
    {
        return view('contact');
    }


    public function blogSingle()
    {
        return view('blog_single');
    }

    public function adminVideo()
    {
        return view('admin_video');
    }
}
