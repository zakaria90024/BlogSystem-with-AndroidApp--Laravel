<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $student = Student::all();
      return view('student.index',compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //for validartion ==============================
      $validatedData = $request->validate([
       'name' => 'required|max:50|min:4',
       'email' => 'required|unique:students|max:120|min:9',
       'phone' => 'required|unique:students|max:12|min:9',
      ]);

      $student = new Student;
      $student->name = $request->name;
      $student->email = $request->email;
      $student->phone = $request->phone;
      $student->save();
      $notification=array(
        'messege'=>'Successfully Inserted',
        'alert-type'=>'success'
      );
      return Redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

             $student = DB::table('students')->where('id', $id)->first();
            // return view('student.index', 'student');
          //  $student = Student::findorfail($id);
             print_r($student);
            //return view('student.index', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $student = Student::findorfail($id);
      return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $student = Student::findorfail($id);
      $student -> name = $request->name;
      $student -> email = $request->email;
      $student -> phone = $request->phone;

      $student->save();
      $notification=array(
        'messege'=>'Successfully updated',
        'alert-type'=>'success'
      );
      return Redirect()->to('/student')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $student = Student::find($id);
      $student->delete();
      $notification=array(
        'messege'=>'Successfully deleted',
        'alert-type'=>'success'
      );
      return Redirect()->back()->with($notification);
    }
}
