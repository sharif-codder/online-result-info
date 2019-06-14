<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class FacultyLoginController extends Controller
{

	public function __construct(){

        $this->middleware('guest:faculty')->except('logout');

	}

    public function showLoginForm(){

    	return view('auth.faculty-login');
    }

      public function redirectTo()
    {
        return 'admin';
    }

    public function login(Request $request){

    	//Validate the form data

    	$this->validate($request,[

    		'userid' => 'required',
    		'password' => 'required'

    	]);

    	//Attempt to log the user

    	if(Auth::guard('faculty')->attempt(['userid'=>$request->userid,'password'=>$request->password])){
           
           //if successful, then redirect to their intended loaction

    		return redirect()->route('faculty.home');

    	}

    	//if unsuccessful, then redirect to the login with form data
        
        return redirect()->back()->withInput($request->only('userid'));
    }

    public function logout()
    {
        Auth::guard('faculty')->logout();

        return redirect()->route('faculty.login');
    }
}
