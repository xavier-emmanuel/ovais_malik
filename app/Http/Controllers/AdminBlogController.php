<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Blog;
use Image;

class AdminBlogController extends Controller
{
    //
    public function ajaxShow(Request $request){

    	$blog = Blog::all();
    	$data = array();

    	foreach($blog as $row) {
    		$id =  $row->id;
            $title = $row->title;
            $created_at = $row->created_at->format('F d, Y h:i:s A');
            if (empty($row->updated_at)) {
            	$updated_at = '';
            } else {
            	$updated_at = $row->updated_at->format('F d, Y h:i:s A');
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
	    if($input['blog_featured_image'])
		   {
		      $file = $input['blog_featured_image'];
		      $thumbnail = Image::make($file);
		      $name=time().$file->getClientOriginalName();
		      $file->move(public_path().'/uploads/admin-blogs/original/', $name);
		      $thumbnail->resize(525,315);
		      $thumbnail->save(public_path().'/uploads/admin-blogs/thumbnail/'.$name);
		   }

		$blog = new Blog();

		$blog->title = $input['blog_title'];
		$blog->image = $name;
		$blog->content = $input['blog_content'];
		$blog->category_id = $input['blog_category'];
		$blog->tags = $input['blog_tags'];
		$blog->slug = str_slug($blog->title);
		$blog->updated_at = null;

		$blog->save();

		return response()->json(['success'=>'Added successfully.']);

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

        if(Input::file('blog_featured_image'))
		   {
		       $file = $input['blog_featured_image'];
		       $thumbnail = Image::make($file);
		       $name=time().$file->getClientOriginalName();
		       $file->move(public_path().'/uploads/admin-blogs/original/', $name);
		       $image = $name;
		       $thumbnail->resize(525,315);
		       $thumbnail->save(public_path().'/uploads/admin-blogs/thumbnail/'.$name);
		   }
		   else {
		    $image = $input['hdn_blog_image'];
		   }

		$blog->title = $input['blog_title'];
		$blog->image = $image;
		$blog->content = $input['blog_content'];
		$blog->category_id = $input['blog_category'];
		$blog->tags = $input['blog_tags'];
		$blog->slug = str_slug($blog->title);

		$blog->save();

		return response()->json(['success'=>'Updated successfully.']);

	}

	public function ajaxDelete(Request $request){

		$input = Input::all();
		Blog::find($input['hdn_blog_id'])->delete();

		return response()->json();

	}
}