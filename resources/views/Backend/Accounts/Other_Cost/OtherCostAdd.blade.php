
@extends('admin.admin_master');
@section('admin');

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<body class="hold-transition dark-skin sidebar-mini theme-primary">
<div class="wrapper">
  <div class="content-wrapper">
	  




  <section class="content">

      <!-- Basic Forms -->
    <div class="box">
     <div class="box-header with-border">
         <h4 class="box-title">Add Other Cost </h4>
          </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
          <div class="col">
           <form method="post" action="{{route('store.other.cost') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="row"> {{--  Row Started --}}
              <div class="col-12">

          

            <div class="row" >  {{--  1st Row Started --}}

				<div class="col-md-3">

					<div class="form-group">
					  <h5>Amount <span class="text-danger">*</span></h5>
					  <div class="controls">
						<input  type="text" name="amount"  class="form-control" >
					</div>
					</div>
	
              </div>{{-- 3th col-mid-4 Ended --}}

              <div class="col-md-3">
                <div class="form-group">
                  <h5>Date<span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input  type="date" name="date" class="form-control" >
                </div>
                </div>  
              </div>{{--  3 col-mid-4 Ended --}}

			  <div class="col-md-3">

                <div class="form-group">
                  <h5>Image<span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input type="file" id="image" name="image" class="form-control">
                  </div>
                </div>

              </div>{{--  3 col-mid-4 Ended --}}

			  <div class="col-md-3">
				<div class="form-group">
					<div class="controls"> 
					  <img src="{{ url('upload/no_image.jpg') }}" id="showImage"
					   style="width:100px; height:100px; border:1px solid #000000">
					</div>
				  </div>
               
              </div>{{--  3 col-mid-4 Ended --}}

            </div> {{-- Ended 1st Row  --}}

			<div class="row" >  {{--  2nd Row Started --}}

				<div class="col-md-12">
					<div class="form-group">
						<h5>Description <span class="text-danger">*</span></h5>
						<div class="controls">
							<textarea name="description" id="description" class="form-control" required="" 
							placeholder="Your description" aria-invalid="false"></textarea>
						<div class="help-block"></div></div>
					</div>
					</div>
	
              </div>{{-- 3th col-mid-4 Ended --}}

			  <div class="text-xs-right">
				<input type="submit" class="btn btn-rounded btn-info" value="Submit">
			  </div>
            </div> {{-- Ended 2nd Row  --}}

			
            
        
      
             
            </div>  {{-- End of col-12 --}}
          </div> {{--  Row End --}}        
                    
           </form>
          </div>
         </div>
       </div>
     </section>
    
    
    </div>
  </div>
</body>


<script type="text/javascript">
  $(document).ready(function(){
    $('#image').change(function(e){
      var reader = new FileReader();
      reader.onload = function(e){
        $('#showImage').attr('src',e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    });
  });

</script>

@endsection



