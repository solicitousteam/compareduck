@extends('include.master')
@section('page_title','Banner')
@section('contant')

<div class="page-wrapper">
			<div class="page-content">
			   
			     <div class="container-fluid">
	    <div class="row">
           <div class="col-lg-12">
		     <div class="card">
			   <div class="card-header text-uppercase"> Banner</div>
			     <div class="card-body">
				    <form method="POSt" action="{{('Add_banner')}}" class="form-horizontal" enctype="multipart/form-data">
@csrf

					    <div class="form-group row">
						  <label for="basic-input" class="col-sm-2 col-form-label">Banner Image 1</label>
						  <div class="col-sm-10">
							<div class="input-group mb-3">
                            
								<input type="file" class="form-control" name="image1">
							  </div>
                              <p style="color:red;">@error('image1'){{$message}}@enderror</p>
						  </div>
						  
						  
						
						  </div>
						  
						  
						  
					    <div class="form-group row">
						  <label for="basic-input" class="col-sm-2 col-form-label">Banner Image 2</label>
						  <div class="col-sm-10">
							<div class="input-group mb-3">
                            
								<input type="file" class="form-control" name="image2">
							  </div>
                              <p style="color:red;">@error('image2'){{$message}}@enderror</p>
						  </div>
						  
						  
						
						  </div>
						  
						  
						  
					    <div class="form-group row">
						  <label for="basic-input" class="col-sm-2 col-form-label">Banner Image 3</label>
						  <div class="col-sm-10">
							<div class="input-group mb-3">
                            
								<input type="file" class="form-control" name="image3">
							  </div>
                              <p style="color:red;">@error('image3'){{$message}}@enderror</p>
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