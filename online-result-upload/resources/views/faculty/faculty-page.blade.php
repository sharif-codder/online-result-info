@extends('layouts.online-result-home')
    
@section('content')

	<div class="menu-area">
		<form method="POST" action="{{route('batchwise.student')}}">
			{{csrf_field()}}
		    <div class="form-group">
		       <div class="row">
		       	   <div class="input-wraper">
			       	    <input type="hidden" name="faculty_id" value="{{Auth::guard('faculty')->user()->id}}">
			       	    <label class="control-label col-md-2">Select Batch:</label>
				       <div class="col-md-3">
					        <select name="batch_id" class="form-control">
					        	<option value="" selected disabled>select</option>
					        	@foreach($batchs as $batch)

					        	    <option value="{{$batch->id}}">{{$batch->batch_code}}</option>

					        	@endforeach
					        </select>
		               </div>
		               <label class="control-label col-md-2">Select Subject:</label>
				       <div class="col-md-3">
					        <select name="subject_id" class="form-control">
					        	<option value="" selected disabled>select</option>
					        	@foreach($subjects as $s_subject)

					        	    <option value="{{$s_subject->id}}">{{$s_subject->name}}</option>

					        	@endforeach
					        </select>
		               </div>
		               <div class="col-md-2">
		               	  <input class="btn btn-primary" type="submit" name="group_submit" value="Go">
		               </div>
	                </div>
	            </div>
	        </div>
	        @include('include.form-error');
		</form>
	</div>
    <div class="body-section">
    	<div class="container">
    		<div class="body-title">
    		  <h3>Student List</h3>
    		</div>
	    	<div class="body-wraper">
	    	    @if ($students)
	    	      @if(is_object($subject))
	    	        <h5 class="pull-right" style="margin-bottom: 20px;"><strong>Subject: </strong>{{$subject->name}}</h5>
		    		<form method="POST" id="result_submit" action="{{route('result.submit')}}">
		    			{{csrf_field()}}
		    			  <div class="table-responsive">
			    			<table class="table table-striped">
							    <thead>
							        <tr>
								        <th scope="col">Name</th>
								        <th scope="col">ID</th>
								        <th scope="col">Total Mark</th>
								        <th scope="col">Grade point</th>
								        <th scope="col">Grade</th>
							        </tr>
							    </thead>    
							    @foreach($students as $student)
                                <tbody>
                                    <tr>
	                                 	<td>{{$student->name}}</td>
	                                 	<td>
	                                 		{{$student->student_id}}
	                                 	</td>
	                                 	<td>
	                                 		<input type="text" class="total-mark">
	                                 		<input type="hidden" name="student_id[]" value="{{$student->id}}">
	                                 		<input type="hidden" name="session" value="{{$subject->session}}">
	                                 		<input type="hidden" name="year" value="{{$subject->year}}">
	                                 	</td>
	                                 	<td class="grade_point">
	                                 		<input readonly="readonly" type="text" name="grade_point[]" id="gp_{{$student->student_id}}">
	                                 	</td>
	                                 	<td class="grade"><input readonly="readonly" type="text" name="grade[]" id="g_{{$student->student_id}}"></td>
                                    </tr>
                                </tbody>
							     @endforeach
						    </table>
						   </div> 
					        <input type="hidden" name="subject_id" value="{{$subject->id}}">
					        <input type="hidden" name="batch_id" value="{{$batch_id}}">
					        <input class="btn btn-primary pull-right" type="submit" name="submit_result" value="submit">
					        <div class="clearfix"></div>

					        @include('include.form-error')
		    		</form>
                    
                   @else
                  <p class="alert-danger">Subject doesn't match with the Bacth</p>
                  @endif
                @elseif($check_resutl)
                    <h5 class="pull-right" style="margin-bottom: 20px;"><strong>Subject: </strong>{{$subject->name}}</h5>
                   
		    			{{csrf_field()}}
		    			  <div class="table-responsive">
			    			<table class="table table-striped">
							    <thead>
							        <tr>
								        <th scope="col">Name</th>
								        <th scope="col">ID</th>
								        <th scope="col">Grade point</th>
								        <th scope="col">Grade</th>
							        </tr>
							    </thead>
							    <tbody>   
							      @foreach($check_resutl as $result)
                                    <tr>
				                     	<td>{{$result->student->name}}</td>
				                     	<td>{{$result->student->student_id}}</td>
				                     	<td>
				                            {{$result->grade_point}}
				                        </td>
				                     	<td>{{$result->grade}}</td>
				                    </tr>
							      @endforeach
							    </tbody> 
						    </table>
						  </div>  
					        <a class="btn btn-primary pull-right" href="{{route('result.edite',[$subject->id,$batch_id])}}">Edit</a>
					        
					        <div class="clearfix"></div>
		    		
	            @endif
    	    </div>
        </div>
    </div>
@endsection 

@section('script')

<script>
	$(document).ready(function(){

        $('#result_submit').validate({
	        rules: {
	            "grade_point[]": "required",
	            "grade[]": "required"
	        },
	        messages: {
	            "grade_point[]": "Please fullup all grade-point field",
	            "grade[]": "Please fillup all grade field"
	        }
	        
       });
	});
</script>

@endsection   