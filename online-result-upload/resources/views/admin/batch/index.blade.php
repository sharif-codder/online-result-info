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
                                        <th>Batch Code</th>
                                        <th>Batchwise Student</th>
                                        <th>Batchwise Subject</th>
                                        <th>Status</th>
                                        <th>Creation date</th>
                                        <th>Modification date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@if($batchs)

                                      @foreach($batchs as $batch)
                                        <tr>
	                                        <td>{{$batch->id}}</td>
                                            <td>{{$batch->batch_code}}</td>
                                            <td><a href="{{route('student.show',$batch->id)}}">students</a></td>
                                            <td><a href="{{route('subject.show',$batch->id)}}">subjects</a></td>
                                            <td>{{$status[$batch->is_active]}}</td>
                                            <td>{{$batch->created_at->diffForHumans()}}</td>
	                                        <td>{{$batch->updated_at->diffForHumans()}}</td>
	                                        <td><a class="btn btn-primary" href="{{route('batch.edit',$batch->id)}}">Edit</a>
                                            <a class="btn btn-danger" href="{{route('batch.delete',$batch->id)}}" onclick="return confirm('Are you sure to want to delete this record?')">Delete</a></td>
                                        </tr>
                                      @endforeach

                                	@endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Batch Code</th>
                                        <th>Batchwise Students</th>
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