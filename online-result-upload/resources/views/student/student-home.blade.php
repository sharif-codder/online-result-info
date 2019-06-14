@extends('layouts.online-result-home')
    
@section('content')

    <div class="body-section">
    	<div class="container">
    		<div class="body-title">
    		  <h3>Student Info</h3>
    		</div>
	    	<div class="body-wraper">
	    		<ul style="display:inline-block;">
	    			<li><h4>Name: {{$student->name}}</h4> </li>
	    			<li><h4>ID: {{$student->student_id}}</h4> </li>
	    			<li><h4>Btach:{{$student->batch->batch_code}}</h4></li>
	    		</ul>
	    		<a class="btn btn-primary pull-right" href="{{route('student.result',$student->id)}}">See All Result</a>
	    	</div>
        </div>
    </div>
@endsection 

