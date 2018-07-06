<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Blog;

class AdminController extends Controller
{
  public function adminBlog() {
		return view('admin_blog')->with(array('page' => 'Blog'));
	}

	public function createBlog() {
		$category = Category::all();
		return view('create_blog')->with(array('page' => 'Create Blog', 'data' => $category));
	}

	public function editBlog($slug) {
		$blog = Blog::where('slug', $slug)->first();
		$category = Category::all();
		return view('edit_blog')->with(array('page' => 'Edit Blog', 'blogs' => $blog, 'categories' => $category));
	}

	public function adminCategory() {
		return view('admin_category')->with(array('page' => 'Category'));
	}

	public function adminAudio() {
		return view('admin_audio')->with(array('page' => 'Audio'));
	}

	public function adminVideo()
  	{
    return view('admin_video')->with(array('page' => 'Videos'));
  	}

	public function adminGallery() {
		return view('admin_gallery')->with(array('page' => 'Images'));
	}

	public function previewBlog($slug) {
		$blog = Blog::where('slug', $slug)->first();
        $tags = $blog->tags;
        $tagsArray = explode(',', $tags);
        $latest_post = Blog::where('id', '!=', $blog->id)->latest()->take(8)->get();
        $related_post = Blog::where('category_id', $blog->category_id)->where('id', '!=', $blog->id)->take(6)->get();
		return view('blog_single')->with(array('page' => $blog->title, 'data' => $blog, 'tags' => $tagsArray, 'latest_post' => $latest_post, 'related_post' => $related_post));
	}
}
