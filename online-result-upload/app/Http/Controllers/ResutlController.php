<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ResultSubmitRequest;
use App\Result;
class ResutlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $greade_points = $request->grade_point; 
      $grades = $request->grade; 
      $student_ids= $request->student_id;
      $subject_id = $request->subject_id;
      $batch_id = $request->batch_id;
      $session = $request->session;
      $year = $request->year;

      for($i=0; $i<count($grades); $i++){

         Result::create(['grade_point'=>$greade_points[$i],
                         'grade'=> $grades[$i],
                         'student_id'=> $student_ids[$i],
                         'subject_id'=> $subject_id,
                         'batch_id'=> $batch_id,
                         'session'=> $session,
                         'year'=> $year,
                        ]);

      }

      $results = Result::where('subject_id',$subject_id)->get();

      //dd($results);

      return view('result.index',compact('results','subject_id','batch_id'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editResult($s_id,$b_id)
    {
        $subject_id = $s_id;
        $batch_id = $b_id;

        $get_rsults = Result::where('subject_id',$subject_id)
                            ->where('batch_id',$batch_id)->get();

        
        return view('result.edit',compact('get_rsults','subject_id','batch_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
       

    }

    public function updateResult(Request $request,$s_id,$b_id){

        $greade_points = $request->grade_point; 
        $grades = $request->grade; 
        $result_id = $request->result_id;

        for($i=0; $i<count($grades); $i++){

           //$this->update($result_id[$i],$greade_points[$i],$grades[$i]);

           $result = Result::findOrFail($result_id[$i]);

           $result->update(['grade_point'=>$greade_points[$i],
                         'grade'=>$grades[$i]
                        ]);

        }
        
        $request->session()->flash('comment_message','Successfully Updated');

        $subject_id = $s_id;
        $batch_id = $b_id;

        $results = Result::where('subject_id',$subject_id)
                            ->where('batch_id',$batch_id)->get();

        return view('result.index',compact('results','subject_id','batch_id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
