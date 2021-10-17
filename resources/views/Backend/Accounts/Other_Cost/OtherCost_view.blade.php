
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
				  <h3 class="box-title">Other Cost List</h3>
                  <a href="{{ route('other.cost.add') }}" class="btn btn-rounded btn-success mb-5" 
                  style="float: right;">Add Other Cost</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SL</th>
								<th>Date</th>
                				<th>Amount</th>
								<th>Description</th>
								<th>Image</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ( $allData as $key=> $Value)
								
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ date('d-m-Y', strtotime($Value->date)) }}</td>
								<td>{{ $Value->amount}}</td>
								<td>{{ $Value->description}}</td>
								<td><img src="{{ (!empty($Value->image))? 
									url('upload/cost_images/'.$Value->image):url('upload/no_image.jpg') }}"
									style="width:80px; height:80px;">
								</td>
								<td>
									<a href="{{ route('edit.other.cost',$Value->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
									<a href="{{ route('delete.other.cost',$Value->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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