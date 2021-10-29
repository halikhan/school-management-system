
@extends('admin.admin_master');
@section('admin');

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<body class="hold-transition dark-skin sidebar-mini theme-primary">
<div class="wrapper">


  
  <!-- Left side column. contains the logo and sidebar -->

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
	

		<!-- Main content -->
		<section class="content">
			<div class="row">
			<div class="col-md-12">
				<div class="box bb-3 border-primary">
				  <div class="box-header">
					<h4 class="box-title"><strong>Marksheet PDF</strong></h4>
				  </div>
				  <div class="box-body" style="border: solid 1px; padding: 10px;">
					<br>
					<div class="row">

						<div class="col-md-2" style="float: right;">
							<img src="{{ url('upload/abcd.png') }}" style="width: 120px; height:100px;" alt="logo">
						</div> <!-- End of 1st col-2 -->
						<div class="col-md-2 text-center">

						</div> 
						<div class="col-md-4 text-center">
							<h2>ABC School</h2> 
							<h6>Karachi, Pakistan</h6> 
							<h6>abcdschool@gmail.com</h6> 
							  <h5><strong>Acedemic Transcript</strong></h5>
							  <h6><strong>{{  $allMarks['0']['exam_type']['name'] }}</strong></h6>
						</div> 
						<div class="col-md-4 text-center">
						</div>
						<div class="col-md-12">
							<hr style="color:#ddd; width:100%; border: solid 1px; margin-bottom: 0px;">
							<p style="text-align: right;"><u><i>Print Date:</i>{{ date('d-m-Y') }}</u></p>
						</div>  
					<div><!-- End of 1st row -->
				  </div><!-- EEnd of 1st row -->

				 
				  

				  
				</div> <!-- End of box bb-3 -->

				
				<div class="row">
					<div class="col-md-6">
					
						<table class="table table-hover table-responsive-md" width="100%" border="1" style="border-color:rgb(241, 233, 233);" cellpadding="1" cellspacing="1">

							@php
								$assign_student = App\Models\AssignStudents::where('year_id',$allMarks['0']->year_id)->
								where('class_id',$allMarks['0']->class_id)->first();

							@endphp
							<thead class="thead-dark text-center">
								<tr><th  colspan="2">Result of: {{ $allMarks['0']['student']['name'] }}</th></tr>
								<tr></tr>
								
							</thead>
							<tbody>
								<tr>
									<td width="40%">Name</td>
									<td width="40%">{{ $allMarks['0']['student']['name'] }}</td>
								</tr>
							<tr>
								<td style="width: 40%;">Student ID</td>
								<td  style="width: 40%;">{{ $allMarks['0']['id_no'] }}</td>
							</tr>
							<tr>
								<td width="40%">Roll No</td>
								<td width="40%">{{ $assign_student->roll }}</td>
							</tr>
							
							<tr>
								<td width="40%">Class</td>
								<td width="40%">{{ $allMarks['0']['student_class']['name'] }}</td>
							</tr>
							<tr>
								<td width="40%">Session</td>
								<td width="40%">{{ $allMarks['0']['year']['name'] }}</td>
							</tr>
						</tbody>
						</table>
					</div> <!-- End of 1st col-6 -->
					<div class="col-md-6">
						<table class="table table-hover table-responsive-md" width="100%" border="1" style="border-color:rgb(241, 233, 233);" cellpadding="1" cellspacing="1">

							<thead class="thead-dark">
								<tr>
									<th>Letter Grade</th>
									<th> Marks Intervel</th>
									<th> Grade Point</th>
								</tr>
							</thead>
							<tbody>
								@foreach ( $allGrades as $marks )
									
								<tr>
									<td width="40%">{{ $marks->grade_name }}</td>
									<td width="40%">{{ $marks->start_marks }} - {{ $marks->end_marks }}</td>
									<td width="40%">{{ number_format((float)$marks->grade_point,2) }} - {{ ($marks->grade_point == 5)?
									 number_format((float)$marks->grade_point,2):number_format((float)$marks->grade_point+1,2)
									 -((float)0.01)}}</td>
								</tr>

								@endforeach
							</tbody>
						</table>
					</div> <!-- End of 2nd col-6 -->
				</div><!-- End of 2nd row -->


				
				<br><br>
				<div class="row"> <!-- 3td row start -->
				<div class="col-md-12">

					<table class="table table-hover table-responsive-md" width="100%" border="1" style="border-color:rgb(241, 233, 233);" cellpadding="1" cellspacing="1">

					<thead class="thead-dark">
					  <tr>
					<th class="text-center">SL</th>

				<th class="text-center">Get Marks</th>
					<th class="text-center">Letter Grade</th>
					<th class="text-center">Grade Point</th>    
					  </tr>
				</thead>

				<tbody>
		  @php
			  $total_marks = 0;
			  $total_point = 0;
		  @endphp

		@foreach($allMarks as $key => $mark)
		@php
		  $get_mark = $mark->marks;
		  $total_marks = (float)$total_marks+(float)$get_mark;
		  $total_subject = App\Models\StudentMarks::where('year_id',$mark->year_id)->where('class_id',$mark->class_id)->where('exam_type_id',$mark->exam_type_id)->where('student_id',$mark->student_id)->get()->count();
		@endphp
		<tr>
		  <td class="text-center">{{ $key+1 }}</td>

		  <td class="text-center">{{ $get_mark }}</td>

		@php
		  $grade_marks = App\Models\MarksGrade::where([['start_marks','<=', (int)$get_mark],['end_marks', '>=',(int)$get_mark ]])->first();
		  $grade_name = $grade_marks->grade_name;
		  $grade_point = number_format((float)$grade_marks->grade_point,2);
		  $total_point = (float)$total_point+(float)$grade_point;
		@endphp
		<td class="text-center">{{ $grade_name }}</td>
		<td class="text-center">{{ $grade_point }}</td>

		</tr>
		@endforeach

<tr>
	  <td colspan="3"><strong style="padding-left: 30px;">Total Maks</strong></td>
	  <td colspan="3"><strong style="padding-left: 38px;">{{ $total_marks }}</strong></td>
</tr>

</tbody>
  </table>

</div> <!-- // end Col md -12    -->     		
</div> <!-- end 3td row start -->



<br><br>


<div class="row">  <!--  4th row start -->
<div class="col-md-12">

	<table class="table table-hover table-responsive-md" width="100%" border="1" style="border-color:rgb(241, 233, 233);" cellpadding="1" cellspacing="1">
		@php
		$total_grade = 0;
		$point_for_letter_grade = (float)$total_point/(float)$total_subject;
		$total_grade = App\Models\MarksGrade::where([['start_point','<=',$point_for_letter_grade],
		['end_point','>=',$point_for_letter_grade]])->first();

		$grade_point_avg = (float)$total_point/(float)$total_subject;

		@endphp
		<tr>
		  <td width="50%"><strong>Grade Point Average</strong></td>
		  <td width="50%"> 
			@if($countfail > 0)
			0.00
			@else
			{{number_format((float)$grade_point_avg,2)}}
			@endif
		  </td>
		</tr>

		<tr>
		  <td width="50%"><strong>Letter Grade </strong></td>
		  <td width="50%"> 
			@if($countfail > 0)
			F
			@else
			{{ $total_grade->grade_name }}
			@endif
		  </td>
		</tr>
		<tr>
		  <td width="50%">Total Marks with Fraction</td>
		  <td width="50%"><strong>{{ $total_marks }}</strong></td>
		</tr>

			  </table>        
					</div>        
				  </div>   <!--  End 4th row start -->


		<br><br>

			  <div class="row">  <!--  5th row start -->
				<div class="col-md-12">

					<table class="table table-hover table-responsive-md" width="100%" border="1" style="border-color:rgb(241, 233, 233);" cellpadding="1" cellspacing="1">
						<tbody>
				<tr>
				  <td style="text-align: left;"><strong>Remrks:</strong>
										@if($countfail > 0)
					Fail
					@else
					{{ $total_grade->remarks }}
					@endif
				  </td>
				</tr>

			 </tbody>
			  </table>        
										</div>        
				  </div>   <!--  End 5th row start --> 


			 <br><br><br><br>

				<div class="row"> <!--  6th row start -->
				  <div class="col-md-4">
					<hr style="border: solid 1px; widows: 60%; color:rgb(241, 233, 233); margin-bottom: -3px;">
					<div class="text-center">Teacher</div>
				  </div>
			  
											<div class="col-md-4">
				  <hr style="border: solid 1px; widows: 60%; color:rgb(241, 233, 233); margin-bottom: -3px;">
					<div class="text-center">Parents / Guardian </div>
				  </div>

					<div class="col-md-4">
				 <hr style="border: solid 1px; widows: 60%; color:rgb(241, 233, 233); margin-bottom: -3px;">
					<div class="text-center">Principal / Headmaster</div>
				  </div>

				</div>  <!--  End 6th row start -->


				<br><br>
			</div> <!-- End of 1st col-12 -->
		  </div>
			</div>
		</section><!-- /.content -->
	  
	  </div>
  </div>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
</body>


<!-- // Marks Entry Table =========== -->


<script type="text/javascript">
  $(document).on('click','#search',function(){
    var year_id = $('#year_id').val();
    var class_id = $('#class_id').val();
	var assign_subject_id = $('#assign_subject_id').val();
	var exam_type_id = $('#exam_type_id').val();
     $.ajax({
      url: "{{ route('student.marks.getstudents')}}",
      type: "GET",
      data: {'year_id':year_id,'class_id':class_id},
      success: function (data) {
        $('#MarksEntry').removeClass('d-none');
        var html = '';
        $.each( data, function(key, v){
          html +=
          '<tr>'+
          '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"> <input type="hidden" name="id_no[]" value="'+v.student.id_no+'"> </td>'+
          '<td>'+v.student.name+'</td>'+
          '<td>'+v.student.fname+'</td>'+
          '<td>'+v.student.gender+'</td>'+
          '<td><input type="text" class="form-control form-control-sm" name="marks[]"></td>'+
          '</tr>';
        });
        html = $('#MarksEntry-tr').html(html);
      }
    });
  });

</script>

<!-- Load class by subject -->

<script type="text/javascript">
	$(function(){
	  $(document).on('change','#class_id',function(){
		var class_id = $('#class_id').val();
		$.ajax({
		  url:"{{ route('marks.getsubject') }}",
		  type:"GET",
		  data:{class_id:class_id},
		  success:function(data){
			var html = '<option value="">Select Subject</option>';
			$.each( data, function(key, v) {
			  html += '<option value="'+v.id+'">'+v.school_subject.name+'</option>';
			});
			$('#assign_subject_id').html(html);
		  }
		});
	  });
	});
  </script>

@endsection