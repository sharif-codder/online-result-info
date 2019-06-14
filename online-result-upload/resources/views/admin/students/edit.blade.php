@extends('layouts.admin-template')

  
  @section('content')
 
    <div class="row">
      	<div class="col-md-12">
      		<div class="card">
                <form class="form-horizontal" method="POST" action="{{route('student.update',$student->id)}}">
                    {{csrf_field()}}
                    @method('PUT')
                    <div class="card-body">
                        <h4 class="card-title">Create Student</h4>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fname" name="name" value="{{$student->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Student ID</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fname" name="userid" value="{{$student->student_id}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Select Bacth</label>
                            <div class="col-sm-9">
                                <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="batch_id">
                                       <option selected>select</option>

                                    @foreach($batchs as $batch)

                                      <option {{$student->batch_id == $batch->id?'selected':''}} value="{{$batch->id}}">
                                        {{$batch->batch_code}}
                                      </option>
                                    
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="fname" name="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="is_active">
                                       <option selected disabled>select</option>

                                    @foreach($status as $key=>$is_active)

                                      <option {{$student->is_active == $key?'selected':''}} value="{{$key}}">
                                        {{$is_active}}
                                      </option>
                                    
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

  @endsection