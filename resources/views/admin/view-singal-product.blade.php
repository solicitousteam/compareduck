@extends('include.master')
@section('contant')

<style>
.active{
padding: 3px 15px;
font-size: 18px;
border-radius: 4px;
border: none;
background: linear-gradient( 
45deg , #17ead9, #6078ea)!important;
outline: none!important;
color: white;
}

.inactive{

background: linear-gradient( 
45deg , #f54ea2, #ff7676)!important;
width: 10%;
padding: 3px 15px;
font-size: 18px;
border-radius: 4px;
border: none;
outline: none!important;
color: white;
/*}*/
</style>
<div class="page-wrapper">
<div class="page-content">

<div class="container-fluid">


<div class="row">

<div class="col-lg-12">
<div class="card">
<div class="row">

<div class="col-md-6"> <h5 class="card-header text-uppercase"> Product Details </h5></div>


<div class="card-body">

<div class="">
<table class="table table-bordered">
<thead>
<tr>
<th>Categroy Name</th>
<td>{{$list->categroy}}</td>
</tr>
<tr>
<th>Subcategroy Name</th>
<td>{{$list->sub_categroy}}</td>
</tr>

<tr>
<th>Product Name</th>
<td>{{$list->pro_name}}</td>
</tr>

<tr>
<th>Product Image</th>
<td><a href="{{url('uploads/product_images/product_single_img/'.$list->pro_img)}}" data-fancybox="images" data-caption="This image has a caption">
<img src="{{url('uploads/product_images/product_single_img/'.$list->pro_img)}}" alt="lightbox" class="lightbox-thumb img-thumbnail" style="width: 140px; height: 100px;">
</a></td>
</tr>


<tr>

<th>Product MRP</th>
<td>₹{{$list->pro_mrp}}</td>

</tr>
<tr>  
<th>Product Price</th>
<td>₹{{$list->pro_price}}</td>

</tr>


<tr>  
<th>Product Discount</th>
<td>{{$list->pro_discount}}%</td>

</tr>

<tr>  
<th>Product About</th>
<td>{{$list->pro_about}}</td>

</tr>

<tr>  
<th>Product Size</th>
<td>{{$list->size}}</td>

</tr>

<tr>  
<th>Product Type</th>
<td>{{$list->type}}</td>

</tr>
<tr>
<th>Product Color</th>

<td>
    
    @foreach($color as $colors)
<img src="{{asset('uploads/product_images/product_multi_img/'.$colors->color_id)}}" alt="{{$colors->color_id}}" alt="lightbox" class="lightbox-thumb img-thumbnail" style="width: 140px; height: 100px;">
    
    @endforeach
</td>

</tr>


<tr>
<th>Product Images</th>

<td>
    
           @foreach($color as $colors)
           @php $images=json_decode($colors->images, true)@endphp
            @if(is_array($images) && !empty($images))
@foreach($images as $image)
<img src="{{asset('uploads/product_images/product_multi_img/'.$image)}}" alt="{{$image}}" alt="lightbox" class="lightbox-thumb img-thumbnail" style="width: 140px; height: 100px;">
@endforeach

@endif
@endforeach


</td>

</tr>



<!--<tr>  -->
<!--<th>Product Quantity</th>-->
<!--<td>{{$list->quantity}}</td>-->

<!--</tr>-->


<tr>  
<th>Product Description</th>
<td>{!! $list->pro_description !!}</td>

</tr>

<tr>  
<th>Product Status</th>
<td>
<?php if($list['status']=='1'){?>

<small class="active">Active</small>
<?php } else{?>

<small class="inactive">Inactive</small>
<?php } ?>

</td>
</tr>
</thead>
</table>
</div>
</div>


</div>
</div>     
</div>
</div>  
</div>
</div>



@endsection



