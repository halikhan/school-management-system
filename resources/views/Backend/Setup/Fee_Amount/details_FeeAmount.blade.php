
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
				  <h3 class="box-title">Fee Amount Details</h3>
                  <a href="{{ route('Fee.Amount.add') }}" class="btn btn-rounded btn-success mb-5" 
                  style="float: right;"> Add Amount Details</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
                    <h4><strong>Fee Category: </strong>{{ $detailsData['0']['fee_category']['name'] }}</h4>
					<div class="table-responsive">
					  <table  class="table table-bordered table-striped">
						<thead class="thead-light">
							<tr>
								<th width="5%">SL</th>
								<th width="50%">Class Name</th>
								<th width="25%">Amount</th>
								
							</tr>
						</thead>
						<tbody>
							@foreach ( $detailsData as $key=> $Detail)
								
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $Detail['student_class'] ['name'] }}</td> 
								<td>{{ $Detail->amount }}</td>
							</tr>	
							@endforeach			
						</tbody>
						<tfoot class="tfoot-light">
							
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