<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
        
    public function fileStore(Request $request) { 
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);
         
        $imageUpload = new Image();
        $imageUpload->filename = $imageName;
        $imageUpload->name = $request->name;
        $imageUpload->save();
        return response()->json(['success'=>$imageName]);
    }

}