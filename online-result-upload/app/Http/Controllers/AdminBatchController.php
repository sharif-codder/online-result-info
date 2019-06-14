<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Batch;

class AdminBatchController extends Controller
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
        $batchs = Batch::all();

        return view('admin.batch.index',compact('batchs','status'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $status = $this->is_active;
        
        return view('admin.batch.create',compact('status'));
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

        Batch::create($inputs);

        return redirect('admin/batch');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

        $status = $this->is_active;

        $batch = Batch::findOrFail($id);

        return view('admin.batch.edit',compact('batch','status'));
        
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

        $batch = Batch::findOrFail($id);

        $input = $request->all();
        
        $batch->update($input);

        return redirect('admin/batch');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }

    public function delete($id){

        $batch = Batch::findOrFail($id);
        
        $batch->delete();

        return redirect('admin/batch');

    }
}
