<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\Batch;
use App\Result;

class AdminStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $is_active = ['Not-Active','Active'];

    public function index()
    {
      
      $status = $this->is_active;

      $students = Student::all();

      return view('admin.students.index',compact('students','status'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $status = $this->is_active;

        $batchs = Batch::all();

        return view('admin.students.create',compact('batchs','status'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request);
      
       $inputs = $request->all();

       $inputs['password'] = bcrypt($request->password);

       Student::create($inputs);

       return redirect('admin/student');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
        $status = $this->is_active;

        $students = Student::where('batch_id',$id)->get();

        return view('admin.students.index',compact('students','status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $status = $this->is_active;
        $student = Student::findOrFail($id);
        $batchs = Batch::all();

        return view('admin.students.edit',compact('student','batchs','status'));
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
        $student = Student::findOrFail($id);

        if(trim($request->password) == ''){

            $inputs = $request->except('password');
        }else{

            $inputs = $request->all();

            $inputs['password'] = bcrypt($request->password);
        }

        $student->update($inputs);

        return redirect('admin/student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function delete($id){

        $student = Student::findOrFail($id);

        $student->delete();

        return redirect('admin/student');

    }
}
