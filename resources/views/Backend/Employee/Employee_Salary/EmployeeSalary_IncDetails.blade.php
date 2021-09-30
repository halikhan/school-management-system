
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
				  <h3 class="box-title">Employee Salary Details</h3>
                  <br>
                  <br>
                  <h5><strong>Name: </strong>{{ $details->name }}</h5>
                  <h5><strong>ID: </strong>{{ $details->id_no }}</h5>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SL</th>
                                
								<th>Previous Salary</th>
                                <th>Present Salary</th>
                                <th>Increment Salary</th>
                                <th>Effected Salary</th>
								
							</tr>
						</thead>
						<tbody>
							@foreach ( $salary_log as $key=> $log )
								
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $log->previous_salary }}</td>
								<td>{{ $log->present_salary }}</td>
                                <td>{{ $log->increment_salary }}</td>
                                <td>{{ $log->effected_salary }}</td>
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