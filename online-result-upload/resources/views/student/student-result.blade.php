@extends('layouts.online-result-home')
    
@section('content')

    <div class="body-section">
    	<div class="container">
    		<div class="body-title">
    		  <h3>All Resutl Info</h3>
    		</div>
	    	<div class="body-wraper">

	    		<table class="table table-striped">
	    		
	    		  @foreach($test_session as $result_info)
                    
                    @if(!is_object($result_info) && !is_float($result_info))
	                    <tr>
	                      	<td colspan="3" align="center">
	                      		<h4>{{$result_info}}</h4>
	                      	</td>
	                    </tr>
                    @elseif(is_float($result_info))
	                    <tr>
	                        <td colspan="2" align="right">S.G.P.A</td>
	                        <td colspan="1">{{$result_info}}</td>
	                    </tr>    
                    @else
						<tbody>
                            <tr>
                             	<td>{{$result_info->subject->name}}</td>
                             	<td>{{$result_info->grade}}</td>
                             	<td>{{$result_info->grade_point}}</td>
                            </tr>
						</tbody>	    			    
				    @endif

				  @endforeach
				  <tr>
				  	<td colspan="2" align="right">C.G.P.A</td>
				  	<td colspan="1">{{$cgpa}}</td>
				  </tr>
				</table>  
                
	    	</div>
        </div>
    </div>
@endsection 

