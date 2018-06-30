<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Gallery;
use Image;
class AdminImageController extends Controller
{
	public function ajaxShow(Request $request) {
		$images = Gallery::all();
		return response()->json($images);
	}
   public function ajaxStore(Request $request) {
   	$input = Input::all();
   	$images = array();
   	if($request->hasfile('filenames'))
     {
        foreach($request->file('filenames') as $file)
        {
            $picture = Image::make($file);
            $name = time().$file->getClientOriginalName();
						$picture->save(public_path().'/uploads/gallery/images/original/'.$name);
            $picture->resize(255, 170);
						$picture->save(public_path().'/uploads/gallery/images/thumbnails/'.$name);
            $image = new Gallery();
						$image->image = $name;
						$image->caption = $input['caption'];
						$image->updated_at = null;
						$image->save();
        }
     }
   	// if($request->hasfile('images')) {
   	// 	foreach($request->file('images[]') as $file) {
   	// 		$picture = Image::make($file);
				// $name = time().$file->getClientOriginalName();
				// $picture->resize(255,170);
				// $picture->save(public_path().'/uploads/gallery/'.$name);
				// $images[] = $name;
				// dd($images);
   	// 	}
   	// }
		// if($input['add_photos']) {
		// 	$file = $input['add_photos'];
		// 	$picture = Image::make($file);
		// 	$name = time().$file->getClientOriginalName();
		// 	$picture->resize(255,170);
		// 	$picture->save(public_path().'/uploads/gallery/'.$name);
		// }
		return response()->json(['success'=>'Image/s successfully added.']);
   }
}