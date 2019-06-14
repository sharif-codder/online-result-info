<div class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="footer-item-title">
						<h5>Contact info</h5>
					</div>
					<div class="footer-iyem-content">
						<ul>
							<li>House 26,Road 5</li>
							<li>Dhanmondi, Dhaka-1205</li>
							<li>Phone:+88029676031-5</li>
							<li>Fax: +8802967 5981</li>
							<li>Email: info@easternuni.edu.bd</li>
							<li>registrar@easternuni.edu.bd</li>
						</ul>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-item-title">
						<h5>About eu</h5>
					</div>
					<div class="footer-iyem-content">
						<ul>
							<li><a href="">EU Profile </a></li>						 <li><a href="">Board of Trustees </a></li>
							<li><a href="">Message From the Chairman</a></li>
							<li><a href="">Message From the Vice-Chancellor</a></li>
							<li><a href="">International Academic Linkages</a></li>
							<li><a href="">International Advisors</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-item-title">
						<h5>Academics</h5>
					</div>
					<div class="footer-iyem-content"> 						
						<ul>
							<li><a href="">Academic Rules & Procedures</a></li>		 <li><a href="">Registration Procedures </a></li>
							<li><a href="">Rules of Class Attendance </a></li>
							<li><a href="">Tests and Exams</a></li>
							<li><a href="">Academic Standing of a Student</a></li>
							<li><a href="">Degree Requirements </a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-item-title">
						<h5>faculties</h5>
					</div>
					<div class="footer-iyem-content"> 									<ul>
							<li><a href="">Faculty of Business </a></li>		 
							<li><a href="">Registration Procedures</a></li>
							<li><a href="">Administration</a></li>
							<li><a href="">Faculty of Engineering </a></li>
							<li><a href="">Faculty of Law</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
    <script src="{{asset('public/js/libs.js')}}"></script>

    <script>
    	$(document).ready(function(){

    		function Grading(score,grade_point,grade) {
			

				switch(true) {
					case (score <= 100 && score >= 80):
					    $(grade).val('A+');
					    $(grade_point).val('4.00');
					    break;
					case (score < 80 && score >= 75):
					    $(grade).val('A');
					    $(grade_point).val('3.75');
					     break;
					case (score < 75 && score >= 70):
					    $(grade).val('A-');
					    $(grade_point).val('3.5');
					    break;
					   case (score < 70 && score >= 65):
					    $(grade).val('B+');
					    $(grade_point).val('3.25');
					     break;
					case (score < 65 && score >= 60):
					    $(grade).val('B');
					    $(grade_point).val('3.00');
					    break;

					case (score < 60 && score >= 55):
					    $(grade).val('B-');
					    $(grade_point).val('2.75');
					    break;
	                
	                case (score < 55 && score >= 50):
					    $(grade).val('C+');
					    $(grade_point).val('2.5');
					    break;
	                
	                case (score < 50 && score >= 45):
					    $(grade).val('C');
					    $(grade_point).val('2.25');
					    break;

	                case (score < 45 && score >= 40):
					    $(grade).val('D');
					    $(grade_point).val('2.00');
					    break;
	                
	                case (score < 40 && score >= 0):
					    $(grade).val('F');
					    $(grade_point).val('0.00');
					    break;

					case (score > 100 || score < 0):
					    $(grade).val('INVALID SCORE');
					    $(grade_point).val('INVALID SCORE');
					    break;  

                }
           }    


	       $('.total-mark').keyup(function(){

	       	var total_mark = parseInt($(this).val());

	       var grade_point=$(this).parent().siblings('.grade_point').children();

	        var grade =$(this).parent().siblings('.grade').children();

	         Grading(total_mark,grade_point,grade);
	       });

        });
    </script>

    @yield('script')

</body>
</html>