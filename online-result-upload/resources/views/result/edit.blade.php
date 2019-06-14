@extends('layouts.online-result-home')

@section('content')

<form method="POST" action="{{route('result.update',[$subject_id,$batch_id])}}">
	{{csrf_field()}}
	<div class="body-section">
		<div class="container">
			<div class="body-title">
	    		<h3>Student Result List</h3>
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
				      @foreach($get_rsults as $result)

	                    <tr>
	                     	<td>{{$result->student->name}}</td>
	                     	<td>{{$result->student->student_id}}</td>
	                     	<td class="grade_point">
	                     		<input type="text" name="grade_point[]" value=" {{$result->grade_point}}">
	                        </td>
	                     	<td class="grade">
	                     		<input type="text" name="grade[]" value="{{$result->grade}}">
	                     		<input type="hidden" name="result_id[]" value="{{$result->id}}">
	                     	</td>
	                    </tr>

				      @endforeach
				    </thead>
				</table>
		        <input class="btn btn-primary pull-right" type="submit" name="update_result" value="Update">
		        <div class="clearfix"></div>
	    	</div>
		</div>
	</div>
</form>

@endsection