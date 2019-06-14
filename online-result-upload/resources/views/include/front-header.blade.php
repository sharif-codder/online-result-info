<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Software Engineering Project</title>
    <link href="{{asset('public/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/libs.css')}}" rel="stylesheet">
</head>
<body>
	<header>
   	    <div class="container">
   	        <div class="row">
   	        	<div class="header-wraper">
				    <div class="header-left">
				    	<h1><a href="">Eastern University</a></h1>
				    	<span>A leader in quality education</span>
				    </div>
					<div class="header-right">
	                      @if(Auth::guard('faculty')->check())

	                       <ul>
                                
                                <li><h5><a href="{{route('faculty.home')}}">home</a></h5></li>
                                <li><a href="{{route('faculty.subject.batch')}}">Subject-Batch</a></li>
		                       	<li><h5><a href="{{ route('faculty.logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a></h5></li>

	                       </ul>

                            <form id="logout-form" action="{{ route('faculty.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                            @elseif(Auth::guard('student')->check())
                            <ul>
                                
                                <li><h5><a href="{{route('student.home')}}">home</a></h5></li>
		                       	<li><h5><a href="{{ route('student.logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a></h5></li>

	                       </ul>

                            <form id="logout-form" action="{{ route('student.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            @else
                            <ul>
                                
                                <li><h5><a href="{{url('/')}}">Home</a></h5></li>
	                       </ul>
                            
	                      @endif
					</div>
			    </div>		
			</div>
	    </div>
	</header>