
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
			
			<div class="col-12">
				<div class="box bb-3 border-primary">
				  <div class="box-header">
					<h4 class="box-title"> Student <strong>Marks Enrty</strong></h4>
				  </div>
				  <div class="box-body">

					<form method="POST" action="{{ route('marks.entry.store') }}">
						@csrf 
						<div class="row">

							<div class="col-md-3">

								<div class="form-group">
								  <h5>Year<span class="text-danger"></span></h5>
								  <div class="controls">
								
									<select name="year_id" id="year_id" required class="form-control">
									  <option value="" selected="" disabled="" >Select Year</option>
										@foreach ($years as $year )
										<option value="{{ $year->id }}" >{{ $year->name }} </option>
										@endforeach
										
									</select>
								</div>
								</div>
				
							  </div>{{--  1 col-mid-3 Ended --}}
				
							  <div class="col-md-3">
				
								<div class="form-group">
								  <h5>Class<span class="text-danger"></span></h5>
								  <div class="controls">
								
									<select name="class_id" id="class_id" required class="form-control">
									  <option value="" selected="" disabled="" >Select Class</option>
									  @foreach ($classes as $class )
									  <option value="{{ $class->id }}">{{ $class->name }}</option>
									  @endforeach
									</select>
								</div>
								</div>
				
							  </div>{{--  2 col-mid-3 Ended --}}

							  <div class="col-md-3">
				
								<div class="form-group">
								  <h5>Subject<span class="text-danger"></span></h5>
								  <div class="controls">
									<select name="assign_subject_id" id="assign_subject_id" required class="form-control">
									  <option value="" selected="" disabled="" >Select Subject</option>


									</select>
								</div>
								</div>
				
							  </div>{{--  3rd col-mid-3 Ended --}}
							  <div class="col-md-3">
				
								<div class="form-group">
								  <h5>Exam Type<span class="text-danger"></span></h5>
								  <div class="controls">
								
									<select name="exam_type_id" id="exam_type_id" required class="form-control">
									  <option value="" selected="" disabled="" >Select Exam Type</option>
									  @foreach ($exam_type as $ExamType )
									  <option value="{{ $ExamType->id }}">{{ $ExamType->name }}</option>
									  @endforeach
									</select>
								</div>
								</div>
				
							  </div>{{--  3rd col-mid-3 Ended --}}

							 
						</div> <!-- End Row -->

						<div class="row"> <!-- 2nd Row -->
						<div class="col-md-4">

							<a id="search" name="search" class="btn btn-primary " >Search</a>
					</div>{{--  4 col-mid-3 Ended --}}
					</div><!-- End Row -->
					<br>

					<!-- ////// --- - -  Student Marks Entry Table -- - - ///////-->

						<div class="row d-none" id="MarksEntry">
							<div class="col-md-12">
								<table class="table table-bordered table-striped" style="width: 100%">
									<thead>
										<tr>
											<th>ID No</th>
											<th>Student Name</th>
											<th>Father Name</th>
											<th>Gender</th>
											<th>Marks</th>
										</tr>
									</thead>
									<tbody id="MarksEntry-tr">
									</tbody>
								</table>
								<input type="submit" class="btn btn-rounded btn-primary" value="Submit">
							</div>
						</div>

					</form>

				  </div><!-- End of box-body -->
				</div> <!-- End of box bb-3 -->
			</div> <!-- End of 1st col-12 -->


		
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
</body>

// Marks Entry Table ===========

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