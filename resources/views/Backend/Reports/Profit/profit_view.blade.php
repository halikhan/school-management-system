
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
					<h4 class="box-title">Manage <strong>Monthly-Yearly Profit</strong></h4>
				  </div>
				  <div class="box-body">
						<div class="row">

                            
                            <div class="col-md-4">
                                <div class="form-group">
                                  <h5>Start Date<span class="text-danger">*</span></h5>
                                  <div class="controls">
                                    <input  type="date" name="start_date" id="start_date" class="form-control">
                                </div>
                                </div>
            
                              </div>{{-- End of col-4 --}}
                            <div class="col-md-4">
                            <div class="form-group">
                              <h5>End Date<span class="text-danger">*</span></h5>
                              <div class="controls">
                                <input  type="date" name="end_date" id="end_date" class="form-control">
                            </div>
                            </div>
        
                          </div>{{-- End of col-4 --}}
				

							  <div class="col-md-4" style="padding-top: 25px;">
									<a id="search" name="search" class="btn btn-primary">Search</a>
							</div>{{--  3th col-mid-4 Ended --}}
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

										<tr>
											@{{{tdsource}}}
										</tr>

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
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
     $.ajax({
      url: "{{route('report.profit.datewise.get')}}",
      type: "get",
      data: {'start_date':start_date,'end_date':end_date},
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