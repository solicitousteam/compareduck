@extends('include.master')
@section('page_title','Product')
@section('contant')

<style>

.button1{
    position: relative;
    bottom: 38px;
        padding: 6px 27px;
    }
    
    </style>

<div class="page-wrapper">
			<div class="page-content">
				

    <div class="container-fluid">

	    <div class="row">
           <div class="col-lg-12">
		     <div class="card">
			   <div class="card-header text-uppercase">Update Product</div>
			 
			   <div class="text-end"><button type="back" onclick="goBack()" class="btn btn-primary button1"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></button></div>
			     <div class="card-body">
			        
				    <form method="POST" action="admin/update-product" class="form-horizontal" enctype="multipart/form-data">
				        
				        
				        
@csrf
@include('layouts.flash-message')
<input type="hidden" name="id" value="{{$proselect['id']}}">


					    <div class="form-group row">
						  <label for="basic-input" class="col-sm-2 col-form-label">Product Name</label>
						  <div class="col-sm-10">
							<div class="input-group mb-3">
                            
								<input type="text" class="form-control" value="{{$proselect['pro_name']}}" name="pro_name" placeholder="some text" value="">
							  </div>
							 
                             
						  </div>
						</div>
					

						
						<div class="form-group row">
						  <label for="basic-input" class="col-sm-2 col-form-label">Product Image</label>
						  <div class="col-sm-4">
                          <div class="col-sm-12">
<P> <span><input type="file" name="pro_img" class="form-control" autocomplete="nope" ></span></P>
<input type="hidden" name="logohidden" value="{{$proselect['pro_img']}}">
<img src="{{('../uploads/product_images/product_single_img/'.$proselect->pro_img)}}" alt="lightbox" class="lightbox-thumb img-thumbnail" style="width: 90px; height: 55px;">
</div>
						  </div>
						  
						  		  
							  	  <label for="basic-input" class="col-sm-2 col-form-label">Product Mrp</label>
						  <div class="col-sm-4">
							<div class="input-group mb-3">
                            
								<input type="number" name="pro_mrp" value="{{$proselect['pro_mrp']}}" class="form-control" id="priceBalance">
							  </div>
                             
						  </div>
						  
						  
						  		  	  <label for="basic-input" class="col-sm-2 col-form-label">Discount</label>
						  <div class="col-sm-4">
							<div class="input-group mb-3">
                            
							<input type="number" name="pro_discount" value="{{$proselect['pro_discount']}}" class="form-control" id="priceDiscount" min='1' max='100'>
							  </div>
                             
						  </div>
						  
						  		  <label for="basic-input" class="col-sm-2 col-form-label">Product Price</label>
						  <div class="col-sm-4">
							<div class="input-group mb-3">
                            
							<input type="number" name="pro_price" value="{{$proselect['pro_price']}}" class="form-control" id="priceResult" readonly>
							  </div>
							  </div>
				
						  
				 	  <label for="basic-input" class="col-sm-2 col-form-label">Size</label>
						  <div class="col-sm-4">
							<div class="input-group mb-3">
							    @php 


$size = explode(',', $proselect->size);


@endphp

@if(in_array('XS', $size))
<input class="form-check-input" type="checkbox" name="size[]"  value="XS" id="xs" checked> &nbsp;&nbsp;XS&nbsp;&nbsp;
@else
<input class="form-check-input" type="checkbox" name="size[]"  value="XS" id="xs" > &nbsp;&nbsp;XS&nbsp;&nbsp;
@endif


@if(in_array('S', $size))
<input class="form-check-input" type="checkbox" name="size[]"  value="S" id="s" checked> &nbsp;&nbsp;S&nbsp;&nbsp;
@else
<input class="form-check-input" type="checkbox" name="size[]"  value="S" id="s" > &nbsp;&nbsp;S&nbsp;&nbsp;
@endif

@if(in_array('M', $size))
<input class="form-check-input" type="checkbox" name="size[]"  value="M" id="s" checked> &nbsp;&nbsp;M&nbsp;&nbsp;
@else
<input class="form-check-input" type="checkbox" name="size[]"  value="M" id="s" > &nbsp;&nbsp;M&nbsp;&nbsp;
@endif

@if(in_array('L', $size))
<input class="form-check-input" type="checkbox" name="size[]"  value="L" id="s" checked> &nbsp;&nbsp;L&nbsp;&nbsp;
@else
<input class="form-check-input" type="checkbox" name="size[]"  value="L" id="s" > &nbsp;&nbsp;L&nbsp;&nbsp;
@endif


@if(in_array('XL', $size))
<input class="form-check-input" type="checkbox" name="size[]"  value="XL" id="s" checked> &nbsp;&nbsp;XL&nbsp;&nbsp;
@else
<input class="form-check-input" type="checkbox" name="size[]"  value="XL" id="s" > &nbsp;&nbsp;XL&nbsp;&nbsp;
@endif


@if(in_array('XXL', $size))
<input class="form-check-input" type="checkbox" name="size[]"  value="XXL" id="s" checked> &nbsp;&nbsp;XXL&nbsp;&nbsp;
@else
<input class="form-check-input" type="checkbox" name="size[]"  value="XXL" id="s" > &nbsp;&nbsp;XXL&nbsp;&nbsp;
@endif

@if(in_array('XXXL', $size))
<input class="form-check-input" type="checkbox" name="size[]"  value="XXXL" id="s" checked> &nbsp;&nbsp;XXXL&nbsp;&nbsp;
@else
<input class="form-check-input" type="checkbox" name="size[]"  value="XXXL" id="s" > &nbsp;&nbsp;XXXL&nbsp;&nbsp;
@endif

@if(in_array('Free Size', $size))
<input class="form-check-input" type="checkbox" name="size[]"  value="Free Size" id="s" checked> &nbsp;&nbsp;Free Size&nbsp;&nbsp;
@else
<input class="form-check-input" type="checkbox" name="size[]"  value="Free Size" id="s" > &nbsp;&nbsp;Free Size&nbsp;&nbsp;
@endif

							    
						  	</div>
						  		</div>

				
						</div>

<div class="form-group row">
	<label  class="form-label">Product Color and images</label>
<div class="col-md-12">

<div class="col-md-7" style="float: left;">

<?php
foreach($color as $clr) {
$attrImgs =  App\Models\product_attr::where('id',$clr->id)->first();        
         $images = json_decode($attrImgs->images); 
         foreach ($images as $image) { ?>
         	<div class="col-sm-3" style="display: inline-block;">
         		<img src="<?php echo asset('uploads/product_images/product_multi_img/'.$image) ?>" height="150px" width="150px">
         	</div> 
         	
         <?php } ?><br><br>
  <?php } ?>
</div>
<div class="col-md-5" style="float: left;">

<?php
foreach($color as $clr) { ?>         	
        <img src="<?php echo asset('uploads/product_images/product_multi_img/'.$clr->color_id) ?>" height="150px" width="150px"> 
        <br><br>       	
         	
        
  <?php } ?>
</div>
<table class="table table-responsive table-striped table-bordered">  
<thead>
	<tr>
    	<td>Thumbnail Image</td>
    	<td>Multiple Images</td>
    	<td>Color Name</td>
    	<td>Size</td>
    </tr>
</thead>
<tbody id="TextBoxContainer">
</tbody>
<tfoot>
  <tr>
    <th colspan="5">
    <button id="btnAdd" type="button" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add more controls"><i class="fa-solid fa-plus"></i>&nbsp; Add&nbsp;</button></th>
  </tr>
</tfoot>
</table>
</div>	
</div>			
					


<div class="form-group row">
						  <label for="basic-input" class="col-sm-2 col-form-label">About product</label>
						  <div class="col-sm-4">
							<div class="input-group mb-3">
								<textarea name="pro_about" rows="5" cols="57">{{$proselect['pro_about']}}</textarea>
							  </div>
						  </div>
						  
						  
						  		  <label for="basic-input" class="col-sm-2 col-form-label">Type</label>
						  <div class="col-sm-4">
							<div class="input-group mb-3">

<select name="type" class="form-control single-select">
<option value="">Select Type</option>
<option value="Featured" {{($proselect->type)=='Featured' ? 'selected' : ''}}>Featured</option>
<option value="Popular" {{($proselect->type)=='Popular' ? 'selected' : ''}}>Popular</option>
<option value="New_added" {{($proselect->type)=='New_added' ? 'selected' : ''}}>New added</option>
</select> 

							  </div>
						  </div>
						  
						</div>
		
						

		<div class="form-group row">
						  <label for="basic-input" class="col-sm-2 col-form-label">Description</label>
						  <div class="col-sm-10">
							<div class="input-group mb-3">
								<textarea name="editor" >{{$proselect['pro_description']}}</textarea>
							  </div>
						  </div>
						</div>
						
						
						
<!--							<div class="form-group row">-->
<!--						  <label for="basic-input" class="col-sm-2 col-form-label">Product Images and color</label>-->
<!--						  <div class="col-sm-10">-->
<!--							<div class="input-group mb-3">-->
<!--								<table class="table table-responsive table-striped table-bordered">-->
<!--<thead>-->
<!--	<tr>-->
<!--    	<td>Images</td>-->
<!--    	<td>Color</td>-->
<!--    </tr>-->
<!--</thead>-->
<!--<tbody id="TextBoxContainer">-->
<!--</tbody>-->
<!--<tfoot>-->
<!--  <tr>-->
<!--    <th colspan="5">-->
<!--    <button id="btnAdd" type="button" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add more controls"><i class="fa-solid fa-plus"></i>&nbsp; Add&nbsp;</button></th>-->
<!--  </tr>-->
<!--</tfoot>-->
<!--</table>-->
<!--							  </div>-->
<!--						  </div>-->
<!--						</div>-->

		
<p class="text-center"><button type="submit" value="submit"  class="btn btn-success" name="submit">Update</button></p>

					</form>
					</div>
		   
	    </div>
        </div>
								</div><!--end row-->
							</div>
					


   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
  @php 

$data = App\Models\color::get();


@endphp  
    <script>
   $(document).on("change keyup blur", "#priceDiscount", function() {
     var main = $('#priceBalance').val();
     var disc = $('#priceDiscount').val();
     var dec  = (disc / 100).toFixed(2); //its convert 10 into 0.10
     var mult = main * dec; // gives the value for subtract from main value
     var discont = main - mult;
     $('#priceResult').val(discont);
   });
</script>


@push('footer_script')

<script>    

    
$(function () {
  var cn=0;
    $("#btnAdd").bind("click", function () {
        var div = $("<tr />");
        div.html(GetDynamicTextBox("",cn));
        $("#TextBoxContainer").append(div);
         cn =cn+1;
    });
    $("body").on("click", ".remove", function () {
        $(this).closest("tr").remove();
    });
});

function GetDynamicTextBox(value,cn='') {
    return  '<td><input name="colorimg[]" type="file"  class="form-control"  /><p style="color:red;">@error('color_id'){{$message}}@enderror</p></td>'+ '<td><input name = "images'+cn+'[]" type="file" value = "' + value + '" class="form-control" multiple  /><p style="color:red;">@error('images'){{$message}}@enderror</p></td>' +'<td><select name="color'+cn+'" class="form-control"><option value="">--Select Color--</option>@foreach($data as $list)<option value="{{$list->color}}">{{$list->color}}</option> @endforeach</select></td>'+ '<td><input class="form-check-input" type="checkbox" name="colorsize'+cn+'[]"  value="XS" id="s" checked> &nbsp;XS <input class="form-check-input" type="checkbox" name="colorsize'+cn+'[]"  value="S" id="s" checked> &nbsp;S <input class="form-check-input" type="checkbox" name="colorsize'+cn+'[]" value="M" checked id="m"> &nbsp;M <input class="form-check-input" type="checkbox" name="colorsize'+cn+'[]" value="L" checked id="l"> &nbsp;L <input class="form-check-input" type="checkbox" name="colorsize'+cn+'[]" value="XL" id="xl" checked> &nbsp;XL <input class="form-check-input" type="checkbox" name="colorsize'+cn+'[]" value="XXL" id="xxl" checked> &nbsp;XXL <input class="form-check-input" type="checkbox" name="colorsize'+cn+'[]" value="XXXL" id="xxl" checked> &nbsp;XXXL <input class="form-check-input" type="checkbox" name="colorsize'+cn+'[]"  value="Free Size" id="s" > &nbsp;Free Size</td>'+'<td><input name="sku'+cn+'" type="text"  class="form-control"  /><p style="color:red;"></p></td>'+'<td><button type="button" class="btn btn-danger remove"><i class="fa-solid fa-minus"></i></button></td>';
    
}
</script>

@endpush
    
@endsection



