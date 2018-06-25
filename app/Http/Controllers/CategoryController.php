<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Category;

class CategoryController extends Controller
{
    //

    public function ajaxShow(Request $request){

    	$category = Category::all();
    	$data = array();

    	foreach($category as $row) {
    		$id =  $row->id;
            $name = $row->name;
            $created_at = date('d M Y', $row->created_at->timestamp);
            if (isset($row->updated_at->timestamp)) {
            	$updated_at = date('d M Y', $row->updated_at->timestamp);
            } else {
            	$updated_at = '';
            }
            $button = '<td>
						<button type="button" class="btn btn-info edit-category" data-toggle="modal" data-target="#edit-category" data-id="'.$row->id.'" data-name="'.$row->name.'"><i class="fas fa-edit"></i></button>&nbsp;
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-category" data-id="'.$row->id.'" data-name="'.$row->name.'"><i class="fas fa-trash"></i></button>
					   </td>';

    		$data[] = array(
                    $id,
                    $name,
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

		$category = new Category();

		$category->name = $input['category_name'];
		$category->updated_at = null;

		$category->save();

		return response()->json(['success' => 'Added successfully.']);
	}

	public function checkCategoryName(Request $request){

		$category = Category::where('name', Input::get('category_name'))->first();
	   	if ($category) {
	        return response()->json(FALSE);
	   	} else {
	        return response()->json(TRUE);
	    }
	}

	public function ajaxUpdate(Request $request){

		$input = Input::all();
		$category = Category::findOrFail($input['hdn_category_id']);

		$category->name = $input['category_name'];

		$category->save();

		return response()->json(['success'=>'Updated successfully.']);

	}

	public function ajaxDelete(Request $request){

		$input = Input::all();
		Category::find($input['hdn_category_id'])->delete();

		return response()->json();

	}
}
