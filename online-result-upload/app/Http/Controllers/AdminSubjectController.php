<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Subject;

use App\Faculty;

use App\Batch;

use App\Result;

class AdminSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $s_sessions = ['Spring','Summer','Fall'];

    protected $is_active = ['Not-Active','Active'];

    public function index()
    {
        $subjects = Subject::all();

        $sessions = $this->s_sessions;
        $status = $this->is_active;

        return view('admin.subjects.index',compact('subjects','sessions','status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = Faculty::all();
        $batchs = Batch::all();

        $sessions = $this->s_sessions;
        $status = $this->is_active;

      return view('admin.subjects.create',compact('faculties','batchs','sessions','status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        Subject::create($inputs);

        return redirect('admin/subject');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $session_year = Subject::select('session','year')
                           ->where('batch_id',$id)
                           ->groupBy('session','year')
                           ->orderBy('year','asc')
                           ->get();

        $sessions = $this->s_sessions;
        $status = $this->is_active;

        $b_subjects = array();

        foreach ($session_year as $value) {

            array_push($b_subjects,$sessions[$value->session]." ".$value->year);

            $subjects=Subject::where('batch_id',$id)
                           ->where('session',$value->session)
                           ->where('year',$value->year)
                           ->get();

            foreach ($subjects as $subject) {

                array_push($b_subjects, $subject); 
                             
            }          
        }

        return view('admin.batch.batch-wise-subject',compact('b_subjects','status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = Subject::findOrFail($id);

        $faculties = Faculty::all();
        $batchs = Batch::all();
        $sessions = $this->s_sessions;
        $status = $this->is_active;

     return view('admin.subjects.edit',compact('faculties','batchs','subject','sessions','status'));
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
        $subject = Subject::findOrFail($id);
        $inputs = $request->all();

        $subject->update($inputs);

        return redirect('admin/subject');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){

        $subject = Subject::findOrFail($id);

        $subject->delete();

        return redirect('admin/subject');

    }
}
