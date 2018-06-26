<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Video;

class AdminVideoController extends Controller
{
	public function ajaxShow(Request $request) {
		$video = Video::all();
		$data = array();
		
		foreach($video as $row) {
      $created_date = Carbon::parse($row->created_at)->format('M d, Y');
      if($row->updated_at != null){
        $updated_date = Carbon::parse($row->updated_at)->format('M d, Y');
      } else {
        $updated_date = null;
      }
			
      $id = '<td class="text-center">'.$row->id.'</td>';
      $link = '<td>
                <a href="https://www.youtube.com/watch?v='.$row->link.'" target="_blank">https://www.youtube.com/watch?v='.$row->link.'</a>
              </td>';
      $created_at = '<td>'.$created_date.'</td>';
      $updated_at = '<td>'.$updated_date.'</td>';
      $button = '<td>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit-video" id="btn-edit-video" data-id="'.$row->id.'" data-link="https://www.youtube.com/watch?v='.$row->link.'">
                  <i class="fas fa-edit"></i>
                </button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-video" id="btn-delete-video" data-id="'.$row->id.'" data-link="https://www.youtube.com/watch?v='.$row->link.'">
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
		
    function YoutubeID($url)
    {
      if(strlen($url) > 11)
      {
          if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match))
          {
              return $match[1];
          }
          else
              return false;
      }
      return $url;
    }

    $video = new Video;

		$video->link = YoutubeID($request->add_video_link);
		$video->updated_at = null;
		$video->save();

		return response()->json($video);
	}

	public function ajaxUpdate(Request $request) {
		function YoutubeID($url)
    {
      if(strlen($url) > 11)
      {
          if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match))
          {
              return $match[1];
          }
          else
              return false;
      }
      return $url;
    }

    $video = Video::find($request->edit_video_id);

		$video->link = YoutubeID($request->edit_video_link);
		$video->save();

		return response()->json($video);
	}

	public function ajaxDelete(Request $request) {
		$video = Video::find($request->delete_video_id);

		$video->delete();
    return response()->json($video);
	}

	public function addCheckExist(Request $request) {
    function YoutubeID($url)
    {
      if(strlen($url) > 11)
      {
          if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match))
          {
              return $match[1];
          }
          else
              return false;
      }
      return $url;
    }

    $add_youtube_link = YoutubeID($request->add_video_link);

		$video = Video::all()->where('link', $add_youtube_link)->first();
    if ($video) {
        return response()->json(FALSE);
    } else {
        return response()->json(TRUE);
    }
	}

	public function updateCheckExist(Request $request) {
		function YoutubeID($url)
    {
      if(strlen($url) > 11)
      {
          if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match))
          {
              return $match[1];
          }
          else
              return false;
      }
      return $url;
    }

    $update_youtube_link = YoutubeID($request->edit_video_link);
    
    $video = Video::all()->where('link', $update_youtube_link)->first();
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
