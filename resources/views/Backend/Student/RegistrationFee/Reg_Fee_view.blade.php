
@extends('admin.admin_master');
@section('admin');

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>



  <div class="content-wrapper">
	  <div class="container-full">
		<section class="content">
			<div class="row"><!-- 1st row -->
			<div class="col-12">
				<div class="box bb-3 border-primary">
				  <div class="box-header">
					<h4 class="box-title">Student <strong>Registration Fee</strong></h4>
				  </div>
				  <div class="box-body">
						<div class="row">
							<div class="col-md-4">
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
				
							  </div>{{--  4th col-mid-4 Ended --}}
				
							  <div class="col-md-4">
				
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
				
							  </div>{{--  4th col-mid-4 Ended --}}

							  <div class="col-md-4" style="padding-top: 25px;">
									<a id="search" name="search" class="btn btn-primary " >Search</a>
							</div>{{--  5th col-mid-4 Ended --}}
						</div> <!-- End Row -->

					<!-- ////// --- - -  Registration Fee Table -- - - ///////-->

						<div class="row">
							<div class="col-md-12">
								<div id="DocumentResults">
									<script id="document-template" type="text/x-handlebars-template">
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


  <!-- ============ Get Registration Fee Method And View Page =================== -->
 

<script type="text/javascript">
  $(document).on('click','#search',function(){
    var year_id = $('#year_id').val();
    var class_id = $('#class_id').val();
     $.ajax({
      url: "{{route('registration.fee.classwise.get')}}",
      type: "get",
      data: {'year_id':year_id,'class_id':class_id},
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