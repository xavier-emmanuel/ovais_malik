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

     	$count = 0;
        foreach($input['image_file'] as $files)
        {		
            $image = new Gallery();
			$count++;
			$cap_count = 0;
            $file = base64_decode($files);
            $picture = Image::make($file);
            $name = time().str_random(10).'.'.'png';
            $picture->save(public_path().'/uploads/gallery/images/original/'.$name, $file);

            $imageType = array(
                'extra-small' => array(
                    'width' => 250,
                    'path' => 'extra-small'                    
                ),
                'small' => array(
                    'width' => 540,
                    'path' => 'small'                    
                ),
                'medium' => array(
                    'width' => 720,
                    'path' => 'medium'                    
                ),
                'thumbnail' => array(
                    'width' => 50,
                    'path' => 'thumbnail'                    
                )
            );

            foreach ($imageType as $key => $value) {
              $picture->resize($value['width'], null,
                function($constraint) {
                  $constraint->aspectRatio();
                });
              $picture->save(public_path() . '/uploads/gallery/images/'.$value['path'].'/'. $name, $file);
            }

						$image->image = $name;
						foreach ($input['caption'] as $image_caption) {
							$cap_count++;    				
        			if($cap_count == $count) {
								$image->caption = $image_caption;
        			}
        		}
						$image->updated_at = null;

						$image->save();
        }
		return response()->json(['success'=>'Image/s successfully added.']);
  }

  public function ajaxUpdate(Request $request) {
  	$image = Gallery::find($request->edit_image_id);
  	if($request->hasfile('edit_photo')) {
  		$file = $request->file('edit_photo');
  		$picture = Image::make($file);
      $name = time().$file->getClientOriginalName();
			$picture->save(public_path().'/uploads/gallery/images/original/'.$name);

      $imageType = array(
                'extra-small' => array(
                    'width' => 250,
                    'path' => 'extra-small'
                ),
                'small' => array(
                    'width' => 540,
                    'path' => 'small'
                ),
                'medium' => array(
                    'width' => 720,
                    'path' => 'medium'
                ),
                'thumbnail' => array(
                    'width' => 50,
                    'path' => 'thumbnail'
                )
            );

      foreach ($imageType as $key => $value) {
        $picture->resize($value['width'], null,
          function($constraint) {
            $constraint->aspectRatio();
          });
        $picture->save(public_path() . '/uploads/gallery/images/'.$value['path'].'/'. $name);
      }
  		$image->image = $name;
  	}

		$image->caption = $request->edit_caption;
		$image->save();

		return response()->json(['success'=>'Image successfully updated.']);
  }

  public function ajaxDelete(Request $request) {
  	$image = Gallery::find($request->delete_image_id);

		$image->delete();
		return response()->json(['success'=>'Image successfully removed.']);
  }
}
