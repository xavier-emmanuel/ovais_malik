<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Audio;
use App\MP3File;
use App;

class AudioController extends Controller
{

    public function ajaxStore(Request $request){
	    $input = Input::all();

		if($input['add_audio']) {
			$file = $input['add_audio'];
			$name=$input['add_audio_title'].'.mp3';
			$file->move(public_path().'/uploads/audio/', $name);
		}

		$audio = new Audio();

		$audio->title = $input['add_audio_title'];
		$audio->audio_file = App::environment('production') ? '/public/uploads/audio/'.$name : '/uploads/audio/'.$name;
		$mp3file = new MP3File(public_path().'/uploads/audio/'.$name);
		$duration = $mp3file->getDuration();
		$audio->audio_duration = MP3File::formatTime($duration);
		$audio->updated_at = null;

		$audio->save();

		return response()->json(['success' => 'Audio has been successfully added.']);
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
            $created_at = $row->created_at->format('F d, Y h:i A');
            if (empty($row->updated_at)) {
            	$updated_at = '';
            } else {
            	$updated_at = $row->updated_at->format('F d, Y h:i A');
            }
            $button = '<td>
						<button type="button" class="btn btn-info edit-audio" data-toggle="modal" data-target="#edit-audio" data-id="'.$row->id.'" data-title="'.$row->title.'" data-audio="'.$row->audio_file.'"><i class="fas fa-edit"></i></button>&nbsp;
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-audio" data-id="'.$row->id.'" data-title="'.$row->title.'"><i class="fas fa-trash"></i></button>
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

	public function ajaxUpdate(Request $request){

		$input = Input::all();
		$audio = Audio::findOrFail($input['hdn_audio_id']);

        if(Input::file('edit_audio')) {
			$file = $input['edit_audio'];
			$name=$input['edit_audio_title'].'.mp3';
			$file->move(public_path().'/uploads/audio/', $name);
			$audio_file = App::environment('production') ? '/public/uploads/audio/'.$name : '/uploads/audio/'.$name;
			$mp3file = new MP3File(public_path().'/uploads/audio/'.$name);
			$duration = $mp3file->getDuration();
		} else {
		$audio_file = $input['hdn_audio'];
		$mp3_file_duration = str_replace("/public", "", $input['hdn_audio']);
		$mp3file = new MP3File(public_path().$mp3_file_duration);
		$duration = $mp3file->getDuration();
		}

		$audio->title = $input['edit_audio_title'];
		$audio->audio_file = $audio_file;
		$audio->audio_duration = MP3File::formatTime($duration);

		$audio->save();

		return response()->json(['success'=>'Audio has been successfully updated.']);

	}

	public function ajaxDelete(Request $request){

		$input = Input::all();
		Audio::find($input['hdn_audio_id'])->delete();

		return response()->json(['success'=>'Audio has been successfully deleted.']);

	}

}