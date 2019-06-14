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
                                    <th>Student name</th>
                                    <th>Student ID</th>
                                    <th>Grade Point</th>
                                    <th>Grade</th>
                                    <th>Batch</th>
                                    <th>Subject</th>
                                    <th>Session</th>
                                    <th>Year</th>
                                    <th>Creation date</th>
                                    <th>Modification date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@if($results)

                                  @foreach($results as $result)
                                    <tr>
                                        <td>{{$result->id}}</td>
                                        <td>{{$result->student->name}}</td>
                                        <td>{{$result->student->student_id}}</td>
                                        <td>{{$result->grade_point}}</td>
                                        <td>{{$result->grade}}</td>
                                        <td>{{$result->batch->batch_code}}</td>
                                        <td>{{$result->subject->name}}</td>
                                        <td>{{$sessions[$result->session]}}</td>
                                        <td>{{$result->year}}</td>
                                        <td>{{$result->created_at->diffForHumans()}}</td>
                                        <td>{{$result->updated_at->diffForHumans()}}</td>
                                        <td><a class="btn btn-primary" href="{{route('result.edit',$result->id)}}">Edit</a>
                                        <a class="btn btn-danger" href="{{route('result.delete',$result->id)}}" onclick="return confirm('Are you sure to want to delete this record?')">Delete</a></td>
                                    </tr>
                                  @endforeach

                            	@endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Student name</th>
                                    <th>Student ID</th>
                                    <th>Grade Point</th>
                                    <th>Grade</th>
                                    <th>Batch</th>
                                    <th>Subject</th>
                                    <th>Session</th>
                                    <th>Year</th>
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