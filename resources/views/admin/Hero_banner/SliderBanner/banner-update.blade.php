@extends('include.master')
@section('page_title','Slider Banner')
@section('contant')

<div class="page-wrapper">
			<div class="page-content">
			   
			     <div class="container-fluid">
	    <div class="row">
           <div class="col-lg-12">
		     <div class="card">
			   <div class="card-header text-uppercase">Slider Banner</div>
			     <div class="card-body">
				    <form method="POSt" action="{{('edit-Sliderbanner')}}" class="form-horizontal" enctype="multipart/form-data">
@csrf
<input type="hidden" name="id" value="{{$banner->id}}"/>

					    <div class="form-group row">
						  <label for="basic-input" class="col-sm-2 col-form-label">Slider Title</label>
						  <div class="col-sm-4">
							<div class="input-group mb-3">
                            
								<input type="text" class="form-control" name="title" placeholder="Enter Slider Title" value="{{$banner->title}}">
							  </div>
                        
						  </div>
						  
						  	  <label for="basic-input" class="col-sm-2 col-form-label">Slider SubTitle</label>
						  <div class="col-sm-4">
							<div class="input-group mb-3">
                            
								<input type="text" class="form-control" name="subtitle" placeholder="Enter Slider SubTitle" value="{{$banner->subtitle}}">
							  </div>
                        
						  </div>
						  
						  
						
						  </div>
						  
						  
						  
					    <div class="form-group row">
						  <label for="basic-input" class="col-sm-2 col-form-label">Slider Image</label>
						  <div class="col-sm-10">
							<div class="input-group mb-3">
                            
								<input type="file" class="form-control" name="image">
							<input type="hidden" class="form-control" name="imagehidden" value="{{$banner->image}}">
							<img src="{{url('uploads/SliderImage/'.$banner->image)}}" width="70px" />
							  </div>
     
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