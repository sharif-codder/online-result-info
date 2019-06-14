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
                                    <th>Student ID</th>
                                    <th>Batch</th>
                                    <th>Status</th>
                                    <th>Result</th>
                                    <th>Creation date</th>
                                    <th>Modification date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@if($students)

                                  @foreach($students as $student)
                                    <tr>
                                        <td>{{$student->id}}</td>
                                        <td>{{$student->name}}</td>
                                        <td>{{$student->student_id}}</td>
                                        <td>{{$student->batch->batch_code}}</td>
                                        <td>{{$status[$student->is_active]}}</td>
                                        <td><a href="{{route('student.result.info',$student->id)}}">Result Info</a></td>
                                        <td>{{$student->created_at->diffForHumans()}}</td>
                                        <td>{{$student->updated_at->diffForHumans()}}</td>
                                        <td><a class="btn btn-primary" href="{{route('student.edit',$student->id)}}">Edit</a>
                                        <a class="btn btn-danger" href="{{route('student.delete',$student->id)}}" onclick="return confirm('Are you sure to want to delete this record?')">Delete</a></td>
                                    </tr>
                                  @endforeach

                            	@endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Student ID</th>
                                    <th>Batch</th>
                                    <th>Status</th>
                                    <th>Result</th>
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