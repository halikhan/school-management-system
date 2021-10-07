
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
				  <h3 class="box-title">Employee Attendence List</h3>
                  <a href="{{ route('employee.attendence.add') }}" class="btn btn-rounded btn-success mb-5" 
                  style="float: right;">Add Attendence</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SL</th>
                                <th>Date</th>
								<th width="25%">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ( $allData as $key=> $value)
								
							<tr>
								<td>{{ $key+1 }}</td>
                                <td>{{ date('d-m-Y',strtotime($value->date))}}</td>
								
								<td>
								<a title="Edit" href="{{ route('employee.attendence.edit',$value->date) }}" class="btn btn-info"><i class="fa fa-edit"> Edit</i></a>
								<a title="Details" href="{{ route('employee.attendence.details',$value->date) }}" class="btn btn-danger"><i class="fa fa-eye"> Details</i></a>
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