<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Audio;
use App\Blog;
use App\Gallery;
use App\Logo;
use App\Video;


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
        $logo = Logo::all();
        return view('index')->with(array('page' => 'Home', 'data' => $audio, 'logos' => $logo));
    }

    public function about()
    {
        return view('about')->with(array('page' => 'About'));
    }

    public function gallery()
    {
        $images = Gallery::all();
        return view('gallery')->with(array('page' => 'Gallery', 'images' => $images));
    }

    public function videos()
    {
        $videos = Video::all();
        return view('videos')->with(array('page' => 'Videos', 'data' => $videos));
    }

    public function blogs()
    {
        $blog = Blog::where('published', 1)->latest()->paginate(4);
        return view('blogs')->with(array('page' => 'Blogs', 'data' => $blog));
    }

    public function contact()
    {
        return view('contact')->with(array('page' => 'Contact'));
    }


    public function blogSingle($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $tags = $blog->tags;
        $tagsArray = explode(',', $tags);
        $latest_post = Blog::where('id', '!=', $blog->id)->latest()->take(8)->get();
        $related_post = Blog::where('category_id', $blog->category_id)->where('id', '!=', $blog->id)->take(6)->get();
        return view('blog_single')->with(array('page' => $blog->title, 'data' => $blog, 'tags' => $tagsArray, 'latest_post' => $latest_post, 'related_post' => $related_post));
    }

    public function adminVideo()
    {
        return view('admin_video');
    }

}
