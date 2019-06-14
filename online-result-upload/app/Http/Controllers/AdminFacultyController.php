<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faculty;

class AdminFacultyController extends Controller
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

        $faculties = Faculty::all();

        return view('admin.faculties.index',compact('faculties','status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = $this->is_active;
        
        return view('admin.faculties.create',compact('status'));
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

        $inputs['password'] = bcrypt($request->password);
        
        Faculty::create($inputs);
        
        return redirect('admin/faculty');

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
    public function edit($id)
    {
        $status = $this->is_active;

        $faculty = Faculty::findOrFail($id);

        return view('admin.faculties.edit',compact('faculty','status'));
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
       
       $faculty = Faculty::findOrFail($id);

       if(trim($request->password) == ''){

          $inputs = $request->except('password');

        }else{

          $inputs = $request->all();
          $inputs['password'] = bcrypt($request->password);
        }

        $faculty->update($inputs);

        return redirect('admin/faculty');

    }


    public function delete($id){

        $faculty = Faculty::findOrFail($id);

        $faculty->delete();

        return redirect('admin/faculty');

    }
}
