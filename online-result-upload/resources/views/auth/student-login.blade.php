@extends('layouts.online-result-home')
    
@section('content')
   <div class="body-section login-margin-setup">
		<div class="teacher-log-in">
			<div class="body-title">
			  <h3>Student login</h3>
			</div>
			<div class="body-wraper">
				<form class="forem-group" method="POST" action="{{route('student.login.sumbit')}}">

					{{csrf_field()}}
					<div class="row">
	    				<div class="col-md-12 input-field-setup">
		    				<label>ID</label>
		    				<input id="student_id" type="text"
	                               class="form-control{{ $errors->has('student_id') ? ' is-invalid' : '' }}"
	                               name="student_id" value="{{ old('student_id') }}" required>
	                            @if ($errors->has('student_id'))
	                                <span class="invalid-feedback">
	                                    <strong>{{ $errors->first('student_id') }}</strong>
	                                </span>
	                            @endif       
	    				</div>
	    				<div class="col-md-12 input-field-setup">
		    				<label>Password</label>
		    				<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

	                            @if ($errors->has('password'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong>{{ $errors->first('password') }}</strong>
	                                </span>
	                            @endif
	    				</div>
	    				<!-- <div class="col-md-6 input-field-setup">
	    					
	    				                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
	    				
	    				                                <label class="form-check-label" for="remember">
	    				                                    {{ __('Remember Me') }}
	    				                                </label>
	    				                           
	    				</div> -->
					</div>
	    			<div class="btn-wrqper">
		    			<div class="submit-btn">
		    			  <input type="submit" name="submit_data" value="submit">
		    			</div>
	    			</div>
				</form>
			</div>
		</div>
    </div>	
@endsection



    
	