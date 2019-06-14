<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Batch;
use App\Student;
use App\Faculty;
use App\Result;
use DB;
use Auth;

class StudentController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:student');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $id = Auth::guard('student')->user()->id;
        $student = student::findOrFail($id);

        return view('student.student-home',compact('student'));

    }
}
