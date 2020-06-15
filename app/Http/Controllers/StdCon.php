<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use DB;

class StudentController extends Controller
{
    public function index()
    {
      return view('student.create');
    }

    public function create()
    {
      $student = Student::all();
      return view('student.index',compact('student'));
    }

    public function store(Request $request )
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

    public function show($id)
    {

       $student = DB::table('students')->where('id', $id)->first();
      // return view('student.index', 'student');
    //  $student = Student::findorfail($id);
       print_r($student);
      //return view('student.index', compact('student'));

    }


    public function edit($id)
    {
        $student = Student::findorfail($id);
        return view('student.edit', compact('student'));
    }

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
        return Redirect()->route('all.student')->with($notification);
    }
}
