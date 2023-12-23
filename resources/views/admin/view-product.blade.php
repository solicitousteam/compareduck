@extends('include.master')
@section('contant')




<div class="page-wrapper">
			<div class="page-content">


<div class="col-sm-12">
       <div class="container-fluid">

 <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i>Product<a style="float: right;" class="btn btn-primary" href="add-product"><i class="fa fa-plus-circle" style="margin-right: 0;" aria-hidden="true"></i></a></div>
          
            <div class="card-body">
              <div class="table-responsive">
			        <table id="example2" class="table table-bordered" style="width:100%">
                <thead>
                  <tr>
                        <th>Sr.No.</th>
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                         @include('layouts.flash-message')
                    <?php $i=0;?>
                 @foreach($proview as $settingee)
                 
                 
                   

<tr role="row" class="odd">
<td><?php $i++;?>{{$i}}</td>
<td>{{$settingee->pro_name}}</td>
               <td>             <a href="{{('../uploads/product_images/product_single_img/'.$settingee->pro_img)}}" data-fancybox="images" data-caption="This image has a caption">
<img src="{{('../uploads/product_images/product_single_img/'.$settingee->pro_img)}}" alt="lightbox" class="lightbox-thumb img-thumbnail" style="width: 70px; height: 70px;">
</a></td>

<td>
<input type="checkbox" data-id="{{ $settingee->id }}" name="status" class="js-switch" {{ $settingee->status == 1 ? 'checked' : '0' }}></td>
<td>
    @php $prodID= Crypt::encrypt($settingee->id); @endphp
    <a class="btn btn-primary" href="proupdate{{$prodID}}"><i class="fa fa-pencil"></i></a>
<a class="btn btn-danger" href="prodelete{{$prodID}}" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash"></i></a>
<a class="btn btn-dark" href="proview{{ $settingee->id }}"><i class="fa fa-eye"></i></a>
</td>
@endforeach
</tbody>

</table>


 {{-- Pagination --}}
        <div class="d-flex justify-content-flex-end Pagination_1" >
            {!! $proview->links("pagination::bootstrap-4") !!}
        </div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>



<script>let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
    let switchery = new Switchery(html,  { size: 'small' });
});</script>


<script>
    
    
$(document).ready(function(){
    $('.js-switch').change(function () {
        let status = $(this).prop('checked') === true ? 1 : 0;
        let userId = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: 'product.update.status',
            data: {'status': status, 'id': userId},
            success: function (data) {
                alert(data.message);
            }
        });
    });
});
    
</script>



<style>

.w-5 {
    display: none;
}

.h-5{
    display: none;
}

</style>


@endsection
@stack('footer_script')