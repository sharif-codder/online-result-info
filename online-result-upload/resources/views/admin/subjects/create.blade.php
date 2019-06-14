@extends('layouts.admin-template')

  
  @section('content')
 
    <div class="row">
      	<div class="col-md-12">
      		<div class="card">
                <form class="form-horizontal" method="POST" action="{{route('subject.store')}}">
                    {{csrf_field()}}
                    <div class="card-body">
                        <h4 class="card-title">Insert Subject</h4>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fname" name="name">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Select Bacth</label>
                            <div class="col-sm-9">
                                <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="batch_id">
                                       <option selected disabled>select</option>

                                    @foreach($batchs as $batch)

                                      <option value="{{$batch->id}}">
                                        {{$batch->batch_code}}
                                      </option>
                                    
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Select Faculty</label>
                            <div class="col-sm-9">
                                <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="faculty_id">
                                       <option selected disabled>select</option>

                                    @foreach($faculties as $faculty)

                                      <option value="{{$faculty->id}}">
                                        {{$faculty->name}}
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

                                      <option value="{{$key}}">{{$session}}</option>

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

                                      <option value="{{$key}}">
                                        {{$is_active}}
                                      </option>
                                    
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Year</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fname" name="year">
                            </div>
                        </div>
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