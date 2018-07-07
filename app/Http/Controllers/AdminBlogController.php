<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Blog;
use Image;

class AdminBlogController extends Controller
{
	public function ajaxShow(Request $request) {

		$blog = Blog::all();
		$data = array();

		foreach($blog as $row) {
			$id =  $row->id;
			$title = '<a href="/blogs/'.$row->slug.'" target="_blank">'.$row->title.'</a>';
			$created_at = $row->created_at->format('F d, Y h:i:s A');

			if (empty($row->updated_at)) {
				$updated_at = '';
			} else {
				$updated_at = $row->updated_at->format('F d, Y h:i:s A');
			}

			if ($row->published == 0) {
				$published_at = '<span class="badge badge-danger">Draft</span>';
			} else {
				$published_at = '<span class="badge badge-info">Published</span>';
			}

			$button = '<td>
							<a href="/admin-blog/edit/'.$row->slug.'" class="btn btn-info edit-category"><i class="fas fa-edit"></i></a>&nbsp;
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-blog" data-id="'.$row->id.'" data-title="'.$row->title.'"><i class="fas fa-trash"></i></button>
					</td>';

			$data[] = array(
				$id,
				$title,
				$created_at,
				$updated_at,
				$published_at,
				$button
			);
		}

		$output = array(
			"data" => $data
		);

		return response()->json($output);
	}

	public function ajaxStore(Request $request){

		$input = Input::all();

		if($input['blog_featured_image']) {
			$file = $input['blog_featured_image'];
			$thumbnail = Image::make($file);
			$name=time().$file->getClientOriginalName();
			$file->move(public_path().'/uploads/admin-blogs/original/', $name);
			$thumbnail->resize(1400, 900);
			$thumbnail->save(public_path().'/uploads/admin-blogs/landscape/'.$name);

			$images = array(
                'medium' => array(
                    'width' => 720,
                    'folder' => '/medium/'
                ),
                'small' => array(
                    'width' => 540,
                    'folder' => '/small/'
                ),
                'extrasmall' => array(
                    'width' => 250,
                    'folder' => '/extra-small/'
                ),
                'thumbnail' => array(
                    'width' => 50,
                    'folder' => '/thumbnail/'
                ),
            );

            foreach ($images as $value) {
            	$thumbnail->resize($value['width'], null, function ($constraint) {
				    $constraint->aspectRatio();
				});
				$thumbnail->save(public_path().'/uploads/admin-blogs'.$value['folder'].$name);
			}
		}

		$blog = new Blog();

		$blog->title = $input['blog_title'];
		$blog->description = $input['blog_description'];
		$blog->image = $name;
		$blog->content = $input['blog_content'];
		$blog->category_id = $input['blog_category'];
		$blog->tags = $input['blog_tags'];
		$blog->slug = str_slug($blog->title);
		$blog->published = 0;
		$blog->published_at = null;
		$blog->updated_at = null;

		$blog->save();

		return response()->json(['success'=>'Blog has been successfully added.']);
    }

  	public function checkBlogTitle(Request $request){

		$blog = Blog::where('title', Input::get('blog_title'))->first();
		if ($blog) {
			return response()->json(FALSE);
		} else {
			return response()->json(TRUE);
		}
	}

	public function ajaxUpdate(Request $request){

		$input = Input::all();
		$blog = Blog::findOrFail($input['hdn_blog_id']);

    	if(Input::file('blog_featured_image')) {
			$file = $input['blog_featured_image'];
			$thumbnail = Image::make($file);
			$name=time().$file->getClientOriginalName();
			$file->move(public_path().'/uploads/admin-blogs/original/', $name);
			$thumbnail->resize(1400, 900);
			$thumbnail->save(public_path().'/uploads/admin-blogs/landscape/'.$name);
			$image = $name;

			$images = array(
                'medium' => array(
                    'width' => 720,
                    'folder' => '/medium/'
                ),
                'small' => array(
                    'width' => 540,
                    'folder' => '/small/'
                ),
                'extrasmall' => array(
                    'width' => 250,
                    'folder' => '/extra-small/'
                ),
                'thumbnail' => array(
                    'width' => 50,
                    'folder' => '/thumbnail/'
                ),
            );

            foreach ($images as $value) {
            	$thumbnail->resize($value['width'], null, function ($constraint) {
				    $constraint->aspectRatio();
				});
				$thumbnail->save(public_path().'/uploads/admin-blogs'.$value['folder'].$name);
			}
		}
		else {
			$image = $input['hdn_blog_image'];
		}

		$blog->title = $input['blog_title'];
		$blog->description = $input['blog_description'];
		$blog->image = $image;
		$blog->content = $input['blog_content'];
		$blog->category_id = $input['blog_category'];
		$blog->tags = $input['blog_tags'];
		$blog->slug = str_slug($blog->title);

		$blog->save();

		return response()->json(['success'=>'Blog has been successfully updated.']);
	}

	public function ajaxPublish(Request $request){

		$blog = Blog::where('title', $request->title)->first();

		$blog->published = 1;
		$blog->created_at = $blog->created_at;
		$blog->published_at = Carbon::now();

		$blog->save();

		return response()->json($blog);
	}

	public function ajaxDelete(Request $request){

		$input = Input::all();
		Blog::find($input['hdn_blog_id'])->delete();

		return response()->json(['success'=>'Blog has been successfully deleted.']);
	}

	public function uploadImage(Request $request) {
		$CKEditor = Input::get('CKEditor');
	    $funcNum = Input::get('CKEditorFuncNum');
	    $message = $url = '';
	    if (Input::hasFile('upload')) {
	        $file = Input::file('upload');
	        if ($file->isValid()) {
	            $filename = time().$file->getClientOriginalName();
	            $file->move(public_path().'/uploads/admin-blogs/ckeditor/images/', $filename);
	            if($_SERVER["REMOTE_ADDR"] == "127.0.0.1"){
				    $url = url('/uploads/admin-blogs/ckeditor/images/' . $filename);
				} else{
				    $url = url('/public/uploads/admin-blogs/ckeditor/images/' . $filename);
				}
	        } else {
	            $message = 'An error occured while uploading the file.';
	        }
	    } else {
	        $message = 'No file uploaded.';
	    }
	    return '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "'.$url.'", "'.$message.'")</script>';
	}
}