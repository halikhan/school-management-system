
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
				  <h3 class="box-title">Student Fee List</h3>
                  <a href="{{ route('student.fee.add') }}" class="btn btn-rounded btn-success mb-5" 
                  style="float: right;">Add / Edit Student Fee</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SL</th>
								<th>ID NO</th>
								<th>Name</th>
                				<th>Year</th>
								<th>Class</th>
                				<th>Fee Type</th>
                				<th>Amount</th>
								<th>Date</th>
							</tr>
						</thead>
						<tbody>
							@foreach ( $allData as $key=> $Value)
								
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $Value['student']['id_no']}}</td>
								<td>{{ $Value['student']['name']}}</td>
								<td>{{ $Value['student_year']['name']}}</td>
								<td>{{ $Value['student_class']['name']}}</td>
								<td>{{ $Value['fee_category']['name']}}</td>
								<td>{{ $Value->amount}}</td>
								<td>{{ date('M Y', strtotime($Value->date)) }}</td>
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