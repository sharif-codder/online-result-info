@extends('layouts.online-result-home')



@section('banner')

<div class="banner">
	    <img src="{{asset('public/images/university-lecture.jpg')}}">
		<div class="overlay">
		    <div class="banner-contant">
				<h2>Online Result Info</h2>
				<p>Faculty can upload subject wise result and studetn can see their result through login</p>
				<ul>
					<li><a class="banner-btn" href="{{route('student.login')}}">Student Login</a></li>
					<li><a class="banner-btn" href="{{route('faculty.login')}}">Faculty Login</a></li>
				</ul>
			</div>
		</div>
</div>

@endsection