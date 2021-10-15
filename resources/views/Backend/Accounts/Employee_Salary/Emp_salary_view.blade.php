
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
				  <h3 class="box-title">Employee Salary List</h3>
                  <a href="{{ route('account.empsalary.add') }}" class="btn btn-rounded btn-success mb-5" 
                  style="float: right;">Add / Edit Employee Salary</a>
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
                				<th>Amount</th>
								<th>Date</th>
							</tr>
						</thead>
						<tbody>
							@foreach ( $allData as $key=> $Value)
								
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $Value['user']['id_no']}}</td>
								<td>{{ $Value['user']['name']}}</td>
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