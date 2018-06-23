<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Audio;
use App\MP3File;

class AudioController extends Controller
{
    //

    public function ajaxStore(Request $request){
	    $input = Input::all();

		if($input['add_audio'])
		{
			$file = $input['add_audio'];
			$name=time().$file->getClientOriginalName();
			$file->move(public_path().'/uploads/audio/', $name);
		}

		$audio = new Audio();

		$audio->title = $input['add_audio_title'];
		$audio->audio_file = '/uploads/audio/'.$name;
		$mp3file = new MP3File(public_path().'/uploads/audio/'.$name);
		$duration = $mp3file->getDuration();
		$audio->audio_duration = MP3File::formatTime($duration);
		$audio->updated_at = null;

		$audio->save();

		return response()->json(['success'=>'Added successfully.']);
	}

	public function checkAudioTitle(Request $request){

		$audio = Audio::where('title', Input::get('add_audio_title'))->first();
	   	if ($audio) {
	        return response()->json(FALSE);
	   	} else {
	        return response()->json(TRUE);
	    }
	}

	public function ajaxShow(Request $request){

    	$audio = Audio::all();
    	$data = array();

    	foreach($audio as $row) {
    		$id =  $row->id;
            $title = $row->title;
            $created_at = date('d M Y', $row->created_at->timestamp);
            if (isset($row->updated_at->timestamp)) {
            	$updated_at = date('d M Y', $row->updated_at->timestamp);
            } else {
            	$updated_at = '';
            }
            $button = '<td><button type="button" class="btn btn-info edit-audio" data-toggle="modal" data-target="#edit-audio" data-id="'.$row->id.'" data-title="'.$row->title.'" data-audio="'.$row->audio_file.'"><i class="fas fa-edit"></i></button>&nbsp;<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-audio" data-id="'.$row->id.'"" data-title="'.$row->title.'"><i class="fas fa-trash"></i></button></td>';

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

	public function ajaxUpdate(Request $request){

		$input = Input::all();
		$audio = Audio::findOrFail($input['hdn_audio_id']);

        if(Input::file('edit_audio'))
		   {
		       $file = $input['edit_audio'];
		       $name=time().$file->getClientOriginalName();
		       $file->move(public_path().'/uploads/audio/', $name);
		       $audio_file = 'uploads/audio/'.$name;
		       $mp3file = new MP3File(public_path().'/uploads/audio/'.$name);
			   $duration = $mp3file->getDuration();
		   }
		   else {
		    $audio_file = $input['hdn_audio'];
		    $mp3file = new MP3File(public_path().$audio_file);
		    $duration = $mp3file->getDuration();
		   }

		$audio->title = $input['edit_audio_title'];
		$audio->audio_file = $audio_file;
		$audio->audio_duration = MP3File::formatTime($duration);

		$audio->save();

		return response()->json(['success'=>'Updated successfully.']);

	}

	public function ajaxDelete(Request $request){

		$input = Input::all();
		Audio::find($input['hdn_audio_id'])->delete();

		return response()->json();

	}

	public function ajaxShowMore(Request $request)
    {
        $output = '';
        $output_show_more = '';
        $id = $request->id;
        
        $data = Audio::where('id', '<', $id)->orderBy('created_at','DESC')->limit(2)->get();
        
        if(!$data->isEmpty())
        {
            foreach($data as $audio)
            {                               
                $output .= '<li class="list-group-item audio-list audio-list-id'.$audio->id.'" data-id="'.$audio->id.'" data-title="'.$audio->title.'" data-audio-duration="'.$audio->audio_duration.'" data-audio-file="'.$audio->audio_file.'">
				                <span>
				                  <i class="far fa-play-circle"></i>
				                  &nbsp; '.$audio->title.'
				                </span>
				                <span>'.$audio->audio_duration.'</span>
				            </li>';
            }
            $output_show_more .= '<div class="div-show-more"><li class="list-group-item li-show-more">
		            				<p class="small">
				                            <em>
				                            	<span id="btn-more" data-id="'.$audio->id.'" class="show_more">View More</span>
				                            </em>
			                            </p>
			                        </li></div>';
            return response()->json(['output' => $output, 'btn_show_more' => $output_show_more]);
        }
    }

}
