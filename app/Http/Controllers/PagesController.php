<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Audio;
use App\Blog;


class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $audio = Audio::orderBy('created_at','DESC')->get();

        return view('index')->with(array('page' => 'Home', 'data' => $audio));
    }

    public function about()
    {
        return view('about')->with(array('page' => 'About'));
    }

    public function gallery()
    {
        return view('gallery')->with(array('page' => 'Gallery'));
    }

    public function videos()
    {
        return view('videos')->with(array('page' => 'Videos'));
    }

    public function blogs()
    {
        $blog = Blog::orderBy('created_at','DESC')->paginate(4);
        return view('blogs')->with(array('page' => 'Blogs', 'data' => $blog));
    }

    public function contact()
    {
        return view('contact')->with(array('page' => 'Contact'));
    }


    public function blogSingle($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        return view('blog_single')->with(array('page' => $slug, 'data' => $blog));
    }

    public function adminVideo()
    {
        return view('admin_video');
    }

}
