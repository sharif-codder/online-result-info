<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class StudentLoginController extends Controller
{
    //

    public function __construct(){

        $this->middleware('guest:student')->except('logout');

	}

    public function showLoginForm(){

    	return view('auth.student-login');
    }

    public function login(Request $request){

    	//Validate the form data

    	$this->validate($request,[

    		'student_id' => 'required',
    		'password' => 'required'

    	]);

    	//Attempt to log the user

    	if(Auth::guard('student')->attempt(['student_id'=>$request->student_id,'password'=>$request->password])){
           
           //if successful, then redirect to their intended loaction

    		return redirect()->route('student.home');

    	}

    	//if unsuccessful, then redirect to the login with form data
        
        return redirect()->back()->withInput($request->only('student_id'));

    }

    public function logout()
    {
        Auth::guard('student')->logout();

        return redirect()->route('student.login');
    }
}
