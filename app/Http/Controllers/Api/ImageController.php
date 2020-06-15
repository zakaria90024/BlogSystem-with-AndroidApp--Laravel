<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ImageController extends Controller
{
  //for image transper with api ===============================
  public function viewImage()
  {

    return response()->download(public_path('frontend/image/1669363920333195.png'), 'User Image');
  }

  //for post image from api
  public function postImage(Request $request)
  {
      $filename = "1669363920333195.png";
      $path = $reques->file('photo')->move(public_path('frontend/image/1669363920333195.png'), $filename);
      $photoURL = url('/'.$filename);
      return response()->json(['url'=>$photoURL], 200);
  }
}
