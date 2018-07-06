<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;

class AdminSettingsController extends Controller
{
   	public function changeUserCredential(Request $request) {
   		$user = User::find($request->user_id);
   		
   		if(! $request->new_username == '' || ! $request->new_password == '') {
   			if(! $request->new_username == '') {
	   		$user->username = $request->new_username;   			
	   		}
	   		if(! $request->new_password == '') {
			 		$user->password = bcrypt($request->new_password);   			
	   		}
				$user->save();

				return response()->json(['success'=>'User credentials has been successfully updated.']);
   		} else {
				return response()->json(['success'=> false, 'message' => 'Nothing has change.']);
   		}
   	}
}
