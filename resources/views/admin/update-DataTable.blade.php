@extends('include.master')
@section('page_title','Product')
@section('contant')
<style>
.ui-sortable-placeholder { 
    	border: 1px dashed black!important; 
        visibility: visible !important;
        background: #eeeeee78 !important;
       }
    .ui-sortable-placeholder * { visibility: hidden; }
        .RearangeBox.dragElemThumbnail{opacity:0.6;}
        .RearangeBox {
            width: 180px;
            height:240px;
            padding:10px 5px;
            cursor: all-scroll;
            float: left;
            border: 1px solid #9E9E9E;
            font-family: sans-serif;
            display: inline-block;            
            margin: 5px!important;
            text-align: center;
            color: #673ab7;
            background: #ffc107;
          /*color: rgb(34, 34, 34);
            background: #f3f2f1;     */
        }


.IMGthumbnail{
    max-width:168px;
    height:220px;
    margin:auto;
  background-color: #ececec;
  padding:2px;
  border:none;
}

.IMGthumbnail img{
   max-width:100%;
max-height:100%;
}

.imgThumbContainer{

  margin:4px;
  border: solid;
  display: inline-block;
  justify-content: center;
    position: relative;
    border: 1px solid rgba(0,0,0,0.14);
  -webkit-box-shadow: 0 0 4px 0 rgba(0,0,0,0.2);
    box-shadow: 0 0 4px 0 rgba(0,0,0,.2);
}



.imgThumbContainer > .imgName{
  text-align:center;
  padding: 2px 6px;
  margin-top:4px;
  font-size:13px;
  height: 15px;
  overflow: hidden;
}

.imgThumbContainer > .imgRemoveBtn{
    position: absolute;
    color: #e91e63ba;
    right: 2px;
    top: 2px;
    cursor: pointer;
    display: none;
}

.RearangeBox:hover > .imgRemoveBtn{ 
    display: block;
}
</style>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">


<div class="page-wrapper">
<div class="page-content">
<div class="row">

<div class="col-xl-12 mx-auto">

<h6 class="mb-0 text-uppercase">Product Setting</h6>

<hr/>


    <!--@php-->
    <!--                    $categoryslist = App\Models\category::where('status','1')->get();-->
                        
    <!--                    @endphp-->
                        
<div class="card">

<div class="card-body">

<div class="p-4 border rounded">

<form class="row g-3 " action="updateDataTable" method="post"  enctype="multipart/form-data" i="myform">
@csrf
<input type="hidden" name="id" value="{{$data['id']}}"/>

<div class="col-md-6">

<div class="col-md-6">
<label  class="form-label">Title</label>
<input type="text" name="title" value="{{$data['total_amount']}}" class="form-control" >
</div>


<div class="col-md-6">
<label  class="form-label">Image</label>
<input type="file" name="image"  class="form-control" >
<input type="hidden" name="hiddenimage" value="{{$data['image']}}" class="form-control" >
<img src="{{url('uploads/datatable/'.$data->image)}}" width="70px"/>
</div>












<div class="col-12 text-center">

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

@php 

$data = App\Models\color::get();


@endphp


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
    return  '<td><input name="title[]" type="text"  class="form-control"  /><p style="color:red;">@error('title'){{$message}}@enderror</p></td>'+ '<td><input name = "data'+cn+'[]" type="text" value = "' + value + '" class="form-control"  /><p style="color:red;">@error('data'){{$message}}@enderror</p></td>'+'<td><button type="button" class="btn btn-danger remove"><i class="fa-solid fa-minus"></i></button></td>';
    
}
</script>

<script>

    $(document).ready(function () {

    $('#myform').validate({ 
        rules: {
            editor: {
                required: true,
                email: true
            }
        }
    });

});
    
    
</script>

<script type = "text/javascript">
	jQuery(document).ready(function(){
			jQuery('#catagory').change(function(){
				let cid=jQuery(this).val();
				jQuery.ajax({
					url:'getsubcat',
					type:'post',
					data:'cid='+cid+'&_token={{csrf_token()}}',
					success:function(result){

						jQuery('#subcategory').html(result)
							jQuery('#subcategoryy').html(result)
					}
				});
			});
    });

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" ></script>
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


<script>
    
    
$(function() {
            $("#sortableImgThumbnailPreview").sortable({
             connectWith: ".RearangeBox",
            
                
              start: function( event, ui ) { 
                   $(ui.item).addClass("dragElemThumbnail");
                   ui.placeholder.height(ui.item.height());
           
               },
                stop:function( event, ui ) { 
                   $(ui.item).removeClass("dragElemThumbnail");
               }
            });
            $("#sortableImgThumbnailPreview").disableSelection();
        });




document.getElementById('files').addEventListener('change', handleFileSelect, false);

  function handleFileSelect(evt) {
    
    var files = evt.target.files; 
    var output = document.getElementById("sortableImgThumbnailPreview");
    
    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

      // Only process image files.
      if (!f.type.match('image.*')) {
        continue;
      }

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
           var imgThumbnailElem = "<div class='RearangeBox imgThumbContainer'><i class='material-icons imgRemoveBtn' onclick='removeThumbnailIMG(this)'>cancel</i><div class='IMGthumbnail' ><img  src='" + e.target.result + "'" + "title='"+ theFile.name + "'/></div></div>";
                    
                    output.innerHTML = output.innerHTML + imgThumbnailElem; 
          
        };
      })(f);

      // Read in the image file as a data URL.
      reader.readAsDataURL(f);
    }
  }

  function removeThumbnailIMG(elm){
    elm.parentNode.outerHTML='';
  }



</script>


@endpush



@endsection