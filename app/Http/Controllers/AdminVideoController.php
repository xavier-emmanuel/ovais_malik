<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Video;

class AdminVideoController extends Controller
{
	public function ajaxShow(Request $request) {
		$video = Video::all();
		$data = array();

		foreach($video as $row) {
			$id = '<td class="text-center">'.$row->id.'</td>';
      $link = '<td>
                <a href="'.$row->link.'" target="_blank">'.$row->link.'</a>
              </td>';
      $created_at = '<td>'.$row->created_at->format('F d, Y h:i:s A').'</td>';
      $updated_at = '<td>'.$row->updated_at->format('F d, Y h:i:s A').'</td>';
      $button = '<td>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit-video" id="btn-edit-video" data-id="'.$row->id.'" data-link="'.$row->link.'">
                  <i class="fas fa-edit"></i>
                </button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-video" id="btn-delete-video" data-id="'.$row->id.'" data-link="'.$row->link.'">
                  <i class="fas fa-trash"></i>
                </button>
              </td>';

     	$data[] = array(
     								$id,
     								$link,
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

  public function ajaxStore(Request $request) {
		$video = new Video;

		$video->link = $request->add_video_link;
		$video->updated_at = null;
		$video->save();

		return response()->json($video);
	}

	public function ajaxUpdate(Request $request) {
		$video = Video::find($request->edit_video_id);

		$video->link = $request->edit_video_link;
		$video->save();

		return response()->json($video);
	}

	public function ajaxDelete(Request $request) {
		$video = Video::find($request->delete_video_id);

		$video->delete();
    return response()->json($video);
	}

	public function addCheckExist(Request $request) {
		$video = Video::all()->where('link', Input::get('add_video_link'))->first();
    if ($video) {
        return response()->json(FALSE);
    } else {
        return response()->json(TRUE);
    }
	}

	public function updateCheckExist(Request $request) {
		$video = Video::all()->where('link', Input::get('edit_video_link'))->first();
    if ($video) {
        return response()->json(FALSE);
    } else {
        return response()->json(TRUE);
    }
	}

	public function ajaxDisplayVideos(Request $request) {
		$video = Video::all();

		return response()->json($video);
	}
}
