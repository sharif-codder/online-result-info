@extends('layouts.admin-template')

  @section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><strong>Basic Datatable</strong></h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>User ID</th>
                                    <th>Status</th>
                                    <th>Creation date</th>
                                    <th>Modification date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@if($faculties)

                                  @foreach($faculties as $faculty)
                                    <tr>
                                        <td>{{$faculty->id}}</td>
                                        <td>{{$faculty->name}}</td>
                                        <td>{{$faculty->userid}}</td>
                                        <td>{{$status[$faculty->is_active]}}</td>
                                        <td>{{$faculty->created_at->diffForHumans()}}</td>
                                        <td>{{$faculty->updated_at->diffForHumans()}}</td>
                                        <td><a class="btn btn-primary" href="{{route('faculty.edit',$faculty->id)}}">Edit</a>
                                        <a class="btn btn-danger" href="{{route('faculty.delete',$faculty->id)}}" onclick="return confirm('Are you sure to want to delete this record?')">Delete</a></td>
                                    </tr>
                                  @endforeach

                            	@endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>User ID</th>
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