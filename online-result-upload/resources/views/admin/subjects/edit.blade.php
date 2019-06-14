@extends('layouts.admin-template')

  
  @section('content')
 
    <div class="row">
      	<div class="col-md-12">
      		<div class="card">
                <form class="form-horizontal" method="POST" action="{{route('subject.update',$subject->id)}}">
                    {{csrf_field()}}
                    @method('PUT')
                    <div class="card-body">
                        <h4 class="card-title">Update Subject</h4>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fname" name="name" value="{{$subject->name}}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Select Bacth</label>
                            <div class="col-sm-9">
                                <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="batch_id">
                                       <option selected>select</option>

                                    @foreach($batchs as $batch)

                                      <option {{$subject->batch_id == $batch->id?'selected':''}} value="{{$batch->id}}">
                                        {{$batch->batch_code}}
                                      </option>
                                    
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Select Session</label>
                            <div class="col-sm-9">
                                <select class="select2 form-control custom-select" style="width:100%; height:36px;" name="session">
                                    <option selected disabled>select</option>
                                    @foreach($sessions as $key=>$session)

                                      <option {{$subject->session == $key?'selected':''}} value="{{$key}}">{{$session}}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Year</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fname" name="year" value="{{$subject->year}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Select Bacth</label>
                            <div class="col-sm-9">
                                <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="faculty_id">
                                       <option selected>select</option>

                                    @foreach($faculties as $faculty)

                                      <option {{$subject->faculty_id == $faculty->id?'selected':''}} value="{{$faculty->id}}">
                                        {{$faculty->name}}
                                      </option>
                                    
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="is_active">
                                       <option selected disabled>select</option>

                                    @foreach($status as $key=>$is_active)

                                      <option {{$subject->is_active == $key?'selected':''}} value="{{$key}}">
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