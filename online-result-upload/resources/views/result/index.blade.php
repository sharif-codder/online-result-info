@extends('layouts.online-result-home')

@section('content')
@include('include.flash_message')
	<div class="body-section">
		<div class="container">
			<div class="body-title">
	    		<h3>Student List</h3>
	    	</div>
	    	<div class="body-wraper">
	    		<table class="table table-striped">
				    <thead>
				        <tr>
					        <th>Name</th>
					        <th>ID</th>
					        <th>Grade point</th>
					        <th>Grade</th>
				        </tr>
				      @foreach($results as $result)

	                    <tr>
	                     	<td>{{$result->student->name}}</td>
	                     	<td>{{$result->student->student_id}}</td>
	                     	<td>
	                            {{$result->grade_point}}
	                        </td>
	                     	<td>{{$result->grade}}</td>
	                    </tr>

				      @endforeach
				    </thead>
				</table>

			     <a class="btn btn-primary pull-right" href="{{route('result.edite',[$subject_id,$batch_id])}}">Edit</a>
			     
		        <div class="clearfix"></div>
	    	</div>
		</div>
	</div>
</form>

@endsection 