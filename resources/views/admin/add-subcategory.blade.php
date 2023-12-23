@extends('include.master')
@section('contant')

<div class="page-wrapper">
			<div class="page-content">
			   
			     <div class="container-fluid">

	    <div class="row">
           <div class="col-lg-12">
		     <div class="card">
			   <div class="card-header text-uppercase">Sub Categroy</div>
			     <div class="card-body">
				    <form method="POST" action="add-subcategroy" class="form-horizontal" enctype="multipart/form-data">
@csrf

					    <div class="form-group row">
					        
					        	  <label for="basic-input" class="col-sm-2 col-form-label">Select Categroy</label>
						  <div class="col-sm-4">
							<div class="input-group mb-3">
					        
<select class="form-select form-control mb-2 single-select " name="catagory_id" aria-label="Default select example">
        <option value="">--Select Categroy type--</option>
 @foreach($selectcategorys as $settingee)
 
 
                    <option  value = "{{ $settingee->id }}">{{ $settingee->categroy }} </option>
             @endforeach
             <p style="color:red;">@error('catagory_id'){{$message}}@enderror</p>
</select>
							  </div>
                              
						  </div>
					        
					        
					        
						  <label for="basic-input" class="col-sm-2 col-form-label">Add Sub Categroy</label>
						  <div class="col-sm-4">
							<div class="input-group mb-3">
                            
								<input type="text" class="form-control" value="{{old('subcategroy')}}" name="subcategroy" placeholder="Sub categroy name" value="">
							  </div>
                              <p style="color:red;">@error('subcategroy'){{$message}}@enderror</p>
						  </div>

						  
						  

						  		  
	
    
</div>
						  
						  
						 <p class="text-center"><input type="submit" value="submit"  class="btn btn-success" name="submit"></p>
						</div>
						</form>
						  </div>
						</div>
						  </div>
						</div>
			   
			    </div>
</div>
</div>



@endsection

@push('footer_script')

// <script>
// $(document).ready(function(){
 
//  $('#status').bootstrapToggle({
//   data-on: 'Active',
//   data-off: 'Inactive',
//   data-onstyle: 'success',
//   data-offstyle: 'danger'
//  });

//  $('#status').change(function(){
//   if($(this).prop('checked'))
//   {
//   $('#hidden_status').val('1');
//   }
//   else
//   {
//   $('#hidden_status').val('0');
//   }
//  });
// </script>

@endpush
