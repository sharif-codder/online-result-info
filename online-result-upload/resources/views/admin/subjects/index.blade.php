@extends('layouts.admin-template')

  @section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><strong>Subject List</strong></h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Faculty Name</th>
                                    <th>Batch ID</th>
                                    <th>Session</th>
                                    <th>Year</th>
                                    <td>Status</td>
                                    <th>Creation date</th>
                                    <th>Modification date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@if($subjects)

                                  @foreach($subjects as $subject)
                                    <tr>
                                        <td>{{$subject->id}}</td>
                                        <td>{{$subject->name}}</td>
                                        <td>{{$subject->faculty->name}}</td>
                                        <td>{{$subject->batch->batch_code}}</td>
                                        <td>

                                        {{$sessions[$subject->session]}}

                                        </td>
                                        <td>{{$subject->year}}</td>
                                        <td>{{$status[$subject->is_active]}}</td>
                                        <td>{{$subject->created_at->diffForHumans()}}</td>
                                        <td>{{$subject->updated_at->diffForHumans()}}</td>
                                        <td><a class="btn btn-primary" href="{{route('subject.edit',$subject->id)}}">Edit</a>
                                        <a class="btn btn-danger" href="{{route('subject.delete',$subject->id)}}" onclick="return confirm('Are you sure to want to delete this record?')">Delete</a></td>
                                    </tr>
                                  @endforeach

                            	@endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Faculty Name</th>
                                    <th>Batch ID</th>
                                    <th>Sesion</th>
                                    <th>Year</th>
                                    <th>Status</th>
                                    <th>Creation date</th>
                                    <th>Modification date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

  @endsection