@extends('include.master')
@section('page_title','Catagories')
@section('contant')

<div class="page-wrapper">
			<div class="page-content">
			   
			     <div class="container-fluid">
	    <div class="row">
           <div class="col-lg-12">
		     <div class="card">
			   <div class="card-header text-uppercase">Catagories</div>
			     <div class="card-body">
				    <form method="POSt" action="addcategroy" class="form-horizontal" enctype="multipart/form-data">
@csrf

					    <div class="form-group row">
						  <label for="basic-input" class="col-sm-2 col-form-label">Add Categroy</label>
						  <div class="col-sm-10">
							<div class="input-group mb-3">
                            
								<input type="text" class="form-control" value="{{old('categroy')}}" name="categroy" placeholder="categroy name" value="">
							  </div>
                              <p style="color:red;">@error('categroy'){{$message}}@enderror</p>
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