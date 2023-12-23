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
<form method="POST" action="{{('edit-banner')}}" class="form-horizontal" enctype="multipart/form-data">
@csrf
<input type="hidden" name="id" value="{{$banner->id}}" />

<div class="form-group row">
<label for="basic-input" class="col-sm-2 col-form-label">Banner Image 1</label>
<div class="col-sm-10">
<div class="input-group mb-3">

<input type="file" class="form-control" name="image1" >
<input type="hidden" class="form-control" name="hiddenimage1" value="{{$banner->image1}}">
<img src="{{url('uploads/Banners/'.$banner->image1)}}" alt="image1" width="70px"/>
</div>
</div>



</div>



<div class="form-group row">
<label for="basic-input" class="col-sm-2 col-form-label">Banner Image 2</label>
<div class="col-sm-10">
<div class="input-group mb-3">

<input type="file" class="form-control" name="image2" >
<input type="hidden" class="form-control" name="hiddenimage2" value="{{$banner->image2}}">
<img src="{{url('uploads/Banners/'.$banner->image2)}}" alt="image1" width="70px"/>

</div>
</div>



</div>



<div class="form-group row">
<label for="basic-input" class="col-sm-2 col-form-label">Banner Image 3</label>
<div class="col-sm-10">
<div class="input-group mb-3">

<input type="file" class="form-control" name="image3" >
<input type="hidden" class="form-control" name="hiddenimage3"  value="{{$banner->image3}}">
<img src="{{url('uploads/Banners/'.$banner->image3)}}" alt="image1" width="70px"/>

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