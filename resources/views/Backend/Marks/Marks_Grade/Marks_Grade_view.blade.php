
@extends('admin.admin_master');
@section('admin');



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

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Grade Marks List</h3>
                  <a href="{{ route('marks.grade.add') }}" class="btn btn-rounded btn-success mb-5" 
                  style="float: right;">Add Grade Marks</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SL</th>
								<th>Grade Name</th>
                				<th>Grade Point</th>
                				<th>Start Marks</th>
								<th>End Marks</th>
                				<th>Point Range</th>
                				<th>Remarks</th>
								<th width="15%">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ( $allData as $key=> $Grade)
								
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $Grade->grade_name }}</td>
								<td>{{ number_format((float)$Grade->grade_point,2) }}</td>
                				<td>{{ $Grade->start_marks }}</td>
                				<td>{{ $Grade->end_marks }}</td>
                				<td>{{ $Grade->start_point }} - {{ $Grade->end_point }}</td>
               				 	<td>{{ $Grade->remarks }}</td>
								<td>
									<a title="Edit" href="{{ route('marks.grade.edit',$Grade->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
								</td>
							</tr>	
							@endforeach			
						</tbody>
						<tfoot>
							
						</tfoot>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>      
			</div>
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


@endsection