<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;

class BoloControler extends Controller
{
    public function writePost()
    {
      return view('post.writepost');
    }

    public function addCategory()
    {
      return view('post.add_category');
    }

    public function StoreCategory(Request $request)
    {
      //for validartion ==============================
      $validatedData = $request->validate([
       'name' => 'required|unique:categories|max:255|min:4',
       'slug' => 'required|unique:categories|max:255|min:4',
      ]);

      //for inset categorys table ====================
      $data = array();
      $data['name']=$request->name;
      $data['slug']=$request->slug;
      $category=DB::table('categories')->insert($data);

      //ifelse  for toster succes messege=============
      if($category)
      {
          $notification=array(
            'messege'=>'Successfully Done',
            'alert-type'=>'success'
          );
          return Redirect()->route('all.category')->with($notification);
      }
      else{
            $notification=array(
              'messege'=>'Successfully Done',
              'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
          }

      //return response()->json($data);
      //for print
      //print_r($data)

    }

    public function allCategory()
    {
      $category = DB::table('categories')->get();
      return view('post.all_category', compact('category'));
      //print_r($category);
      //return response()->json($category);
    }


    public function viewCategory($id){
      $category = DB::table('categories')->where('id',$id)->first();
      //return response()->json($category);
      return view('post.categoryview')->with('category', $category);
    }



//for delete date frmo database =======================
    public function deleteCategory($id)
    {
      $category=DB::table('categories')->where('id', $id)->delete();

      if($category)
      {
          $notification=array(
            'messege'=>'Successfully Done',
            'alert-type'=>'success'
          );
          return Redirect()->back()->with($notification);
      }
      else{
            $notification=array(
              'messege'=>'Successfully Done',
              'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
          }
    }

//for update data from database==========================
    public function editCategory($id)
    {
        $category = DB::table('categories')->where('id',$id)->first();
        return view('post.editcategory', compact('category'));

    }
//for update
    public function updateCategory(Request $request, $id)
    {
      //for validartion ==============================
      $validatedData = $request->validate([
       'name' => 'required|max:255|min:4',
       'slug' => 'required|max:255|min:4',
      ]);

      //for inset categorys table ====================
      $data = array();
      $data['name']=$request->name;
      $data['slug']=$request->slug;
      $category=DB::table('categories')->where('id',$id)->update($data);

      //ifelse  for toster succes messege=============
      if($category)
      {
          $notification=array(
            'messege'=>'Successfully Done',
            'alert-type'=>'success'
          );
          return Redirect()->route('all.category')->with($notification);
      }
      else{
            $notification=array(
              'messege'=>'Not Updated',
              'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
          }

    }

}
