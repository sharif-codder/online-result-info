@extends('layouts.admin-template')


  @section('content')

    <div class="row">
      	<div class="col-md-12">
      		<div class="card">
                <form class="form-horizontal" method="POST" action="{{route('batch.store')}}">
                    {{csrf_field()}}
                    <div class="card-body">
                        <h4 class="card-title">Create Batch</h4>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Batch Code</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fname" name="batch_code" placeholder="Enter batch code">
                            </div>
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
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

  @endsection