
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
				  <h3 class="box-title">Employee List</h3>
                  <a href="{{ route('employee.reg.add') }}" class="btn btn-rounded btn-success mb-5" 
                  style="float: right;">Add Employee</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SL</th>
								<th>Name</th>
                <th>ID NO</th>
                <th>Mobile</th>
                <th>Gender</th>
                <th>Join Date</th>
                <th>Salary</th>
                @if (Auth::user()->role == "Admin")
                <th>Code</th>
                @endif
								<th width="25%">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ( $allData as $key=> $Employee)
								
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $Employee->name }}</td>
								<td>{{ $Employee->id_no }}</td>
                <td>{{ $Employee->mobile }}</td>
                <td>{{ $Employee->gender }}</td>
                <td>{{ $Employee->join_date }}</td>
                <td>{{ $Employee->salary }}</td>
                @if (Auth::user()->role == "Admin")
                <td>{{ $Employee->code }}</td>
                @endif 
								<td>
									<a title="Edit" href="{{ route('employee.reg.edit',$Employee->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
									<a title="Details" target="_blank" href="{{ route('employee.reg.details',$Employee->id) }}" class="btn btn-danger"><i class="fa fa-eye"></i></a>
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