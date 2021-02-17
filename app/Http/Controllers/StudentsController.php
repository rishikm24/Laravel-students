<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentsController extends Controller
{
    public function index()
    {
        $students = auth()->user()->students();
        return view('dashboard', compact('students'));
    }

    public function add()
    {
    	return view('add');
    }

    public function searchStudent(){
        $query = Request::input('q');
        $finalstudents = [];
        foreach ($students as $student) {
            if((strpos($student->first_name,$query) == true) || strpos($student->first_name,$query) == true || strpos($student->first_name,$query) == true || strpos($student->first_name,$query) == true){
                array_push($finalstudents,$student);
            }
        }
        return view('search', compact('finalstudents'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:60|min:3',
            'last_name' => 'required|max:60|min:3',
            'phone' => 'digits_between:10,10',
            'email' => 'required|email|unique:users'
        ]);
    	$student = new Student();
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->phone = $request->phone;
        $student->email = $request->email;
    	$student->user_id = auth()->user()->id;
    	$student->save();
    	return redirect('/dashboard'); 
    }
}
