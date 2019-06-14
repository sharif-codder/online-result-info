<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ResultInputRequest;
use App\Subject;
use App\Batch;
use App\Student;
use App\Faculty;
use App\Result;
use DB;
use Auth;

class FacultyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:faculty');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function get_batch_subject(){

        $id = Auth::guard('faculty')->user()->id;
        $faculty = Faculty::findOrFail($id);
        $subjects = Subject::where('faculty_id',$id)
                           ->where('is_active',1)
                           ->get();

        $s_batchs = Subject::select('batch_id')
                           ->where('faculty_id',$id)
                           ->where('is_active',1)
                           ->groupBy('batch_id')
                           ->get();
 
        $batchs = array();

        foreach ($s_batchs as $batch) {
            
            $sub_batch = Batch::where('id',$batch->batch_id)
                              ->first();

            array_push($batchs,$sub_batch);
        }


        return [
                'subjects'=>$subjects,
                'batchs'=>$batchs
               ];
    }


    public function index()
    {

        $sub_batch = $this->get_batch_subject();

        $subjects = $sub_batch['subjects'];
        $batchs = $sub_batch['batchs'];

        $students ='';
        $check_resutl='';

        return view('faculty.faculty-page',compact('batchs','subjects','students','check_resutl'));

    }

    public function getStudentList(ResultInputRequest $request){

        $sub_batch = $this->get_batch_subject();

        $subjects = $sub_batch['subjects'];
        $batchs = $sub_batch['batchs'];
       
        $students ='';
        $batch_id ='';


        $subject = Subject::where('id',$request->subject_id)
                                ->where('faculty_id',$request->faculty_id)
                                ->where('batch_id',$request->batch_id)
                                ->first();

        $check_resutl = Result::where('batch_id',$request->batch_id)
                                ->where('subject_id',$request->subject_id)
                                ->get();


        if(count($check_resutl)>0){

            $subject_id =$request->subject_id;
            $batch_id =$request->batch_id;

            return view('faculty.faculty-page',compact('check_resutl','batchs','subjects','students','batch_id','subject'));
        }else{

            $batch = Batch::findOrFail($request->batch_id);
            $students = $batch->students()->get();

            $batch_id = $request->batch_id;

            return view('faculty.faculty-page',compact('students','batchs','subjects','batch_id','subject'));

            }

    }

    public function subject_batch(){

      $id = Auth::guard('faculty')->user()->id;
      $faculty = Faculty::findOrFail($id);

      $sub_batch = Subject::where('faculty_id',$faculty->id)
                          ->where('is_active',1)
                          ->get();

      return view('faculty.subject-batch',compact('sub_batch'));

    }
}
