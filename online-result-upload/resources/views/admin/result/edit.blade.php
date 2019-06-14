@extends('layouts.admin-template')

  
  @section('content')
 
    <div class="row">
      	<div class="col-md-12">
      		<div class="card">
                <form class="form-horizontal" method="POST" action="{{url('admin/result/'.$result->id)}}">
                    {{csrf_field()}}
                    @method('PUT')
                    <div class="card-body">
                        <h4 class="card-title">Create Faculty</h4>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Grade Point</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fname" name="grade_point" value="{{$result->grade_point}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Grade</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fname" name="grade" value="{{$result->grade}}">
                            </div>
                        </div>
                        <input type="hidden" name="student_id" value="{{$result->student_id}}">
                        <input type="hidden" name="subject_id" value="{{$result->subject_id}}">
                        <input type="hidden" name="batch_id" value="{{$result->batch_id}}">
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

  @endsection