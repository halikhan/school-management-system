
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
				  <h3 class="box-title">Employee Leave</h3>
                  <a href="{{ route('employee.leave.add') }}" class="btn btn-rounded btn-success mb-5" 
                  style="float: right;">Add Employee Leave</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SL</th>
								<th>name</th>
                                <th>ID NO</th>
                                <th>Purpose</th>
                                <th>Start Date</th>
                                <th>End Date</th>
								<th width="25%">Action</th>
								
							</tr>
						</thead>
						<tbody>
							@foreach ( $allData as $key=> $leave)
								
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $leave['user']['name'] }}</td>
                                <td>{{ $leave['user']['id_no'] }}</td>
                                <td>{{ $leave['purpose']['name'] }}</td>
                                <td>{{ $leave->start_date }}</td>
                                <td>{{ $leave->end_date }}</td>
								  
								<td>
								<a href="{{ route('employee.leave.edit',$leave->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
								<a href="{{ route('employee.leave.delete',$leave->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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