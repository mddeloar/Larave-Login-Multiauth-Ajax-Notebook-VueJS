<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    public function index()
    {
    	$students = Student::all();
    	return view('studentform')->with('students',$students);
    }
    public function store(Request $request)
    {
    	$students = new Student;

    	$students->fname = $request->input('fname');
    	$students->lname = $request->input('lname');
    	$students->course = $request->input('course');
    	$students->section = $request->input('section');

    	$students->save();
    }
    public function update(Request $request, $id)
    {
    	$students = Student::find($id);

    	$students->fname = $request->input('fname');
    	$students->lname = $request->input('lname');
    	$students->course = $request->input('course');
    	$students->section = $request->input('section');

    	$students->save();
    }
    public function delete( $id)
    {
    	$students = Student::find($id);
    	$students->delete();
    	return $students;

    }
}
