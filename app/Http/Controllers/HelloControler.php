<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HelloControler extends Controller
{
   public function cotactfun() {
       return view('pages.contact');
   }
   public function aboutfun(){
       return view('pages.about');
   }

   public function index()
   {
     $post=DB::table('posts')->join('categories', 'posts.category_id','categories.id')
     ->select('posts.*', 'categories.name', 'categories.slug')->paginate(4);
     return view('pages.index', compact('post'));
   }
}
