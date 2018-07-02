<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Logo;
use Image;

class AdminLogoController extends Controller
{
  public function ajaxShow() {
  	$logo = Logo::all();

		return response()->json($logo);
  }

  public function ajaxStore(Request $request) {
		$logo = new Logo();
		if($request->hasfile('add_client_logo_image'))
  	{
  		$file = $request->file('add_client_logo_image');
  		$picture = Image::make($file);
      $name = time().$file->getClientOriginalName();
			$picture->save(public_path().'/uploads/gallery/logo/'.$name);
  		$logo->image = $name;
  	}

  	$logo->name = $request->add_client_logo_name;
		$logo->save();

		return response()->json(['success'=>'Client logo successfully added.']);
  }

  public function ajaxUpdate(Request $request) {
  	$logo = Logo::find($request->edit_logo_id);
		if($request->hasfile('edit_client_logo_image'))
  	{
  		$file = $request->file('edit_client_logo_image');
  		$picture = Image::make($file);
      $name = time().$file->getClientOriginalName();
			$picture->save(public_path().'/uploads/gallery/logo/'.$name);
  		$logo->image = $name;
  	}

  	$logo->name = $request->edit_client_logo_name;
		$logo->save();

		return response()->json(['success'=>'Client logo successfully updated.']);
  }

  public function ajaxDelete(Request $request) {
  	$logo = Logo::find($request->delete_logo_id);

		$logo->delete();
		return response()->json(['success'=>'Logo successfully removed.']);
  }
}
