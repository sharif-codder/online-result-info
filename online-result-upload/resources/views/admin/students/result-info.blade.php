@extends('layouts.admin-template')

  @section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><strong>Result info</strong></h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            
                            <tbody>
                                @if($test_session)

                                  @foreach($test_session as $result)
                                    @if(!is_object($result) && !is_float($result))
                                    <tr>
                                        <td colspan="6" align="center">
                                            <h4>{{$result}}</h4>
                                        </td>
                                    </tr>
                                    @elseif(is_float($result))
                                    <tr>
                                        <td colspan="2" align="right">S.G.P.A</td>
                                        <td colspan="1">{{$result}}</td>
                                    </tr> 
                                    @else 
                                    <tr>
                                        <td>{{$result->subject->name}}</td>
                                        <td>{{$result->grade}}</td>
                                        <td>{{$result->grade_point}}</td>
                                        <td>{{$result->created_at->diffForHumans()}}</td>
                                        <td>{{$result->updated_at->diffForHumans()}}</td>
                                        <td><a class="btn btn-primary" href="{{route('result.edit',$result->id)}}">Edit</a>
                                        <a class="btn btn-danger" href="{{route('result.delete',$result->id)}}" onclick="return confirm('Are you sure to want to delete this record?')">Delete</a></td>
                                    </tr>
                                    @endif
                                  @endforeach
                                <tr>
                                    <td colspan="2" align="right">C.G.P.A</td>
                                    <td colspan="4">{{$cgpa}}</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

  @endsection