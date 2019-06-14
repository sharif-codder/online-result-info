@extends('layouts.online-result-home')
    
@section('content')

    <div class="body-section">
    	<div class="container">
    		<div class="body-title">
    		  <h3>Batch-wise Subject</h3>
    		</div>
	    	<div class="body-wraper">
	    		@if(count($sub_batch) > 0)
	    		<table class="table table-striped">
				    <thead>
				        <tr>
					        <th>Subject</th>
					        <th>Batch</th>
				        </tr>
				    </thead>
					<tbody>
						@foreach($sub_batch as $s_b)

                            <tr>
                             	<td>{{$s_b->name}}</td>
                             	<td>{{$s_b->batch->batch_code}}</td>
                            </tr>

					    @endforeach
					</tbody>	    		    
			   </table>
			   @else
			   <p class="alert-danger">You are not assinged to any subject</p>
			   @endif
	    	</div>
        </div>
    </div>
@endsection 

