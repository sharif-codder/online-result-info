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
                                @if($b_subjects)

                                  @foreach($b_subjects as $subject)
                                    @if(!is_object($subject))
                                    <tr>
                                        <td colspan="8" align="center">
                                            <h4>{{$subject}}</h4>
                                        </td>
                                    </tr>
                                    @else 
                                     <tr>
                                        <td>{{$subject->id}}</td>
                                        <td>{{$subject->name}}</td>
                                        <td>{{$subject->faculty->name}}</td>
                                        <td>{{$subject->batch->batch_code}}</td>
                                        <td>{{$status[$subject->is_active]}}</td>
                                        <td>{{$subject->created_at->diffForHumans()}}</td>
                                        <td>{{$subject->updated_at->diffForHumans()}}</td>
                                        <td><a class="btn btn-primary" href="{{route('subject.edit',$subject->id)}}">Edit</a>
                                        <a class="btn btn-danger" href="{{route('subject.delete',$subject->id)}}" onclick="return confirm('Are you sure to want to delete this record?')">Delete</a></td>
                                    </tr>
                                    @endif
                                  @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

  @endsection