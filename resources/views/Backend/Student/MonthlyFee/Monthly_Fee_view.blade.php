
@extends('admin.admin_master');
@section('admin');

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}


</style>

  <div class="content-wrapper">
	  <div class="container-full">
		<section class="content">
			<div class="row"><!-- 1st row -->
			<div class="col-12">
				<div class="box bb-3 border-primary">
				  <div class="box-header">
					<h4 class="box-title">Student <strong>Monthly Fee</strong></h4>
				  </div>
				  <div class="box-body">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
								  <h5>Year<span class="text-danger"></span></h5>
								  <div class="controls">
									<select name="year_id" id="year_id" required class="form-control">
									  <option value="" selected="" disabled="" >Select Year</option>
										@foreach ($years as $year )
										<option value="{{ $year->id }}" >{{ $year->name }} </option>
										@endforeach
										
									</select>
								</div>
								</div>
				
							  </div>{{--  1th col-mid-3 Ended --}}
				
							  <div class="col-md-3">
				
								<div class="form-group">
								  <h5>Class<span class="text-danger"></span></h5>
								  <div class="controls">
								
									<select name="class_id" id="class_id" required class="form-control">
									  <option value="" selected="" disabled="" >Select Class</option>
									  @foreach ($classes as $class )
									  <option value="{{ $class->id }}">{{ $class->name }}</option>
									  @endforeach
									</select>
								</div>
								</div>
				
							  </div>{{--  2nd col-mid-3 Ended --}}

							  <div class="col-md-3">
				
								<div class="form-group">
								  <h5>Month<span class="text-danger"></span></h5>
								  <div class="controls">
									<select name="month" id="month" class="form-control">
									  <option value="" selected="" disabled="" >Select Month</option>
									  <option value="January">January</option>
       								  <option value="February">February</option>
       								 <option value="March">March</option>
       								 <option value="April">April</option>
       								 <option value="May">May</option>
        							 <option value="June">June</option>
       								 <option value="July">July</option>
       								 <option value="August">August</option>
       								 <option value="September">September</option>
       								 <option value="October">October</option>
      								  <option value="November">November</option>
     								   <option value="December">December</option>
									</select>
								</div>
								</div>
				
							  </div>{{--  3rd col-mid-3 Ended --}}

							  <div class="col-md-3" style="padding-top: 25px;">
									<a id="search" name="search" class="btn btn-primary " >Search</a>
							</div>{{--  4th col-mid-4 Ended --}}
						</div> <!-- End Row -->

					<!-- ////// --- - -  Registration Fee Table -- - - ///////-->

						<div class="row">
							<div class="col-md-12">
								<div id="DocumentResults">
									<script id="document-template" type="text/x-handlebars-template">
							<div style="overflow-x:auto;">		
								<table class="table table-bordered table-striped" style="width: 100%">
									<thead>
										<tr>
											@{{{thsource}}}
										</tr>
									</thead>
									<tbody>
										@{{#each this}}
										<tr>
											@{{{tdsource}}}
										</tr>
										@{{/each}}
									</tbody>
								</table>
							</div>
							</script><!-- End of script -->
							</div>
							</div>
						</div>

				  </div>
				  </div>
				  </div><!-- End of box-body -->
				</div> <!-- End of box bb-3 -->
			</div> <!-- End of 1st col-12 -->
 		 </div> <!-- End of 1st row -->
		</section>
	  </div>
  </div>


  <!-- ============ Get Monthly Fee Method And View Page =================== -->
 

<script type="text/javascript">
  $(document).on('click','#search',function(){
    var year_id = $('#year_id').val();
    var class_id = $('#class_id').val();
	var month = $('#month').val();
     $.ajax({
      url: "{{route('monthly.fee.classwise.get')}}",
      type: "get",
      data: {'year_id':year_id,'class_id':class_id,'month':month},
      beforeSend: function() {       
      },
      success: function (data) {
        var source = $("#document-template").html();
        var template = Handlebars.compile(source);
        var html = template(data);
        $('#DocumentResults').html(html);
        $('[data-toggle="tooltip"]').tooltip();
      }
    });
  });

</script>



@endsection