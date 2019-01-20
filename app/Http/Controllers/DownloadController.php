<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
   public function post(Request $request) {
       $img = $request->input('myHiddenField');
       $img = str_replace('data:image/jpeg;base64,', '', $img);
       $img = str_replace(' ', '+', $img);
       $img = base64_decode($img);
       $file_name = 'image_' . time() . '.jpg';

       if ($img != "") {
           Storage::disk('local')->put('test/' . $file_name, $img);
       }

   }
}


