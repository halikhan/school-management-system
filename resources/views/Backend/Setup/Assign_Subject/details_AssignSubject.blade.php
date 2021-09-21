
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
				  <h3 class="box-title">Assign Subject Details</h3>
                  <a href="{{ route('Assign.Subject.add') }}" class="btn btn-rounded btn-success mb-5" 
                  style="float: right;"> Add Assign Subject</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
                    <h4><strong>Assign Subject: </strong>{{ $detailsData['0']['student_class']['name'] }}</h4>
					<div class="table-responsive">
					  <table  class="table table-bordered table-striped">
						<thead class="thead-light">
							<tr>
								<th width="5%">SL</th>
								<th width="20%">Subject</th>
								<th width="20%">Full Marks</th>
								<th width="20%">Pass Marks</th>
								<th width="20%">Subjective Marks</th>
								
							</tr>
						</thead>
						<tbody>
							@foreach ( $detailsData as $key=> $Detail)
								
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $Detail['school_subject'] ['name'] }}</td> 
								<td>{{ $Detail->full_mark }}</td>
								<td>{{ $Detail->pass_mark }}</td>
								<td>{{ $Detail->subjective_mark }}</td>
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