@extends('layouts.admin-template')

  @section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><strong>Result: {{$sessions[$session]." ".$year}}</strong></h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Grade Point</th>
                                    <th>Grade</th>
                                    <th>Creation date</th>
                                    <th>Modification date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($s_result)

                                  @foreach($s_result as $result)
                                    <tr>
                                        <td>{{$result->subject->name}}</td>
                                        <td>{{$result->grade_point}}</td>
                                        <td>{{$result->grade}}</td>
                                        <td>{{$result->created_at->diffForHumans()}}</td>
                                        <td>{{$result->updated_at->diffForHumans()}}</td>
                                        <td><a class="btn btn-primary" href="{{route('result.edit',$result->id)}}">Edit</a>
                                        <a class="btn btn-danger" href="{{route('result.delete',$result->id)}}" onclick="return confirm('Are you sure to want to delete this record?')">Delete</a></td>
                                    </tr>
                                  @endforeach
                                @endif
                                <tr>
                                    <td colspan="1">S.G.P.A</td>
                                    <td colspan="5">{{$average}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

  @endsection