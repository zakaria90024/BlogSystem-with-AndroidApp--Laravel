<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
class PostControler extends Controller
{
    public function writePost()
    {
      $category = DB::table('categories')->get();
      return view('post.writepost', compact('category'));
    }

    //post news with image
    public function storePost(Request $request)
    {
        //for validartion ==============================
        $validatedData = $request->validate([
         'title' => 'required|max:170',
         'details' => 'required',
         'image'=> 'required|mimes:jpeg,jpg,png,PNG|max:1000',
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['category_id']= $request->category_id;
        $data['details']= $request->details;

        $image=$request->file('image');
        if($image)
        {
          // $image_name = Str::random(40);
          $image_name = hexdec(uniqid());
          $ext = strtolower($image->getClientOriginalExtension());
          $image_full_name = $image_name.'.'.$ext;
          $upload_path='public/frontend/image/';
          $image_url = $upload_path.$image_full_name;
          $success=$image->move($upload_path,$image_full_name);
          $data['image']=$image_url;
          DB::table('posts')->insert($data);
          $notification=array(
            'messege'=>'Successfully Done',
            'alert-type'=>'success'
          );
          return Redirect()->back()->with($notification);



        }else{

          DB::table('posts')->insert($data);
          $notification=array(
            'messege'=>'Successfully Done',
            'alert-type'=>'success'
          );
          return Redirect()->back()->with($notification);
        }
    }

    public function allPost()
    {
        //$post=DB::table('posts')->get();
        $post = DB::table('posts')
            ->join('categories', 'posts.category_id', 'categories.id')
            ->select('posts.*', 'categories.name')->get();

        return view('post.allpost', compact('post'));
    }

    public function viewPost($id)
    {
      $post = DB::table('posts')
          ->join('categories', 'posts.category_id', 'categories.id')
          ->select('posts.*', 'categories.name')
          ->where('posts.id',$id)
          ->first();

          return view('post.viewpost', compact('post'));
    }
    public function deletePost($id)
    {
      $post = DB::table('posts')->where('id', $id)->first();
      $image=$post->image;
      $delete =DB::table('posts')->where('id', $id)->delete();
      if($delete){
          unlink($image);
          $notification=array(
          'messege'=>'Successfully Deleted',
          'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

      }else{
          $notification=array(
          'messege'=>'Something wrong',
          'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
      }

    }

    public function editPost($id)
    {
      $category = DB::table('categories')->get();
      $post = DB::table('posts')->where('id', $id)->first();
      return view ('post.editpost', compact('category','post'));
    }

    public function updatePost(Request $request, $id)
    {
      //for validartion ==============================
      $validatedData = $request->validate([
       'title' => 'required|max:170',
       'details' => 'required',
       'image'=> 'mimes:jpeg,jpg,png,PNG|max:1000',
      ]);

      $data = array();
      $data['title'] = $request->title;
      $data['category_id']= $request->category_id;
      $data['details']= $request->details;
      $image=$request->file('image');
      if($image)
      {
        // $image_name = Str::random(40);
        $image_name = hexdec(uniqid());
        $ext = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name.'.'.$ext;
        $upload_path='public/frontend/image/';
        $image_url = $upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['image']=$image_url;
        unlink($request->old_image);
        DB::table('posts')->where('id', $id)->update($data);
        $notification=array(
          'messege'=>'Successfully Done',
          'alert-type'=>'success'
        );
        return Redirect()->route('all.post')->with($notification);

      }else{
        $data['image']=$request->old_image;
        DB::table('posts')->where('id', $id)->update($data);
        $notification=array(
          'messege'=>'Successfully Done',
          'alert-type'=>'success'
        );
        return Redirect()->route('all.post')->with($notification);
      }
    }
}
