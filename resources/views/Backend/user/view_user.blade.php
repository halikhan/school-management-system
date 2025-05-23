
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
				  <h3 class="box-title">User List</h3>
                  <a href="{{ route('user.add') }}" class="btn btn-rounded btn-success mb-5" style="float: right;">Add User</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SL</th>
								<th>Role</th>
								<th>Name</th>
								<th>Email</th>
								<th width="25%">Action</th>
								
							</tr>
						</thead>
						<tbody>
							@foreach ( $allData as $key=> $user)
								
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $user->usertype }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>
									<a href="{{ route('user.edit',$user->id) }}" class="btn btn-info">Edit</a>
									<a href="{{ route('user.delete',$user->id) }}" class="btn btn-danger" id="delete">Delete</a>
								
								</td>
							</tr>	
							@endforeach			
						</tbody>
						<tfoot>
							<tr>
								<th>SL</th>
								<th>Role</th>
								<th>Name</th>
								<th>Email</th>
								<th>Action</th>
								
							</tr>
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