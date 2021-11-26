<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function saveImage(Request $request){
    $image = new Image();
    $image->name = $request->image_title;
     if($request->hasFile('image')){
            $extension = $request->image->extension();

            $name_of_image = strtolower(str_replace(' ', '-', $request->image_title)).'-'.time();
            $name_of_image = $name_of_image.'.'.$extension;

            $image->image_path = $request->image->storeAs(
                'images',
                $name_of_image,
                'public'
            );

            // To save image data in DB
            $image->save();

            return redirect()->route('home')->with('status', 'success');
        } else {
            return redirect()->route('home')->with('status', 'error');
        }
  }
}
