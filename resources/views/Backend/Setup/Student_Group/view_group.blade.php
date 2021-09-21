
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
				  <h3 class="box-title">Student Group List</h3>
                  <a href="{{ route('student.group.add') }}" class="btn btn-rounded btn-success mb-5" 
                  style="float: right;">Add Student Group</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SL</th>
								<th width="50%">Students Group</th>
								<th width="25%">Action</th>
								
							</tr>
						</thead>
						<tbody>
							@foreach ( $allData as $key=> $group)
								
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $group->name }}</td>
								
								<td>
									<a href="{{ route('student.group.edit',$group->id) }}" class="btn btn-info">Edit</a>
									<a href="{{ route('student.group.delete',$group->id) }}" class="btn btn-danger" id="delete">Delete</a>
								
								</td>
							</tr>	
							@endforeach			
						</tbody>
						<tfoot>
							<tr>
								<th>SL</th>	
								<th>Name</th>
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