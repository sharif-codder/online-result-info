<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Result;
use App\Subject;
use App\Student;
use App\Batch;


class AdminResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     protected $s_sessions = ['Spring','Summer','Fall'];

    public function index()
    {

        $sessions = $this->s_sessions;

        $results = Result::all();

        return view('admin.result.index',compact('results','sessions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function result_info($id){

       $sessions = $this->s_sessions;

       $session_year = Result::select('session','year')
                           ->where('student_id',$id)
                           ->groupBy('session','year')
                           ->orderBy('year','asc')
                           ->get();

        $test_session = array();
        $sgpa_avg  = array();

        foreach ($session_year as $value) {

            array_push($test_session,$sessions[$value->session]." ".$value->year);

            $s_result = Result::where('student_id',$id)
                         ->where('session',$value->session)
                         ->where('year',$value->year)
                         ->get();

            $grads = array(); 
                        
            foreach($s_result as $key => $result) {
                
                array_push($test_session,$result);
                array_push($grads,floatval($result->grade_point));
            }

            $sgpa =round(collect($grads)->avg(),2);

            array_push($test_session,$sgpa);
            array_push($sgpa_avg,$sgpa);
            unset($grads);
        }
        
        $cgpa = round(collect($sgpa_avg)->avg(),2);

        return ['test_session'=>$test_session,
                'cgpa'=>$cgpa
               ];
  
        
    }

    public function admin_student_result_info($id){

        $result_info = $this->result_info($id);

        $test_session = $result_info['test_session'];

        $cgpa = $result_info['cgpa'];

        return view('admin.students.result-info',compact('test_session','cgpa'));
    }

    public function student_result_info($id){

        $result_info = $this->result_info($id);

        $test_session = $result_info['test_session'];

        $cgpa = $result_info['cgpa'];

        return view('student.student-result',compact('test_session','cgpa'));
    }

    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = Result::findOrFail($id);

        return view('admin.result.edit',compact('result'));
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
        $result = Result::findOrFail($id);
        $inputs = $request->all();

        $result->update($inputs);

        return redirect('admin/result');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){

        $result = Result::findOrFail($id);

        $result->delete();

        return redirect('admin/result');
    }
}
