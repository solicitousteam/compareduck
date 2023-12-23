@extends('include.front_master')
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> 
    
@section('content')
           	
        </header>
        <!-- header end -->
        <!-- Start breadcumb Area -->
           <style>.page-padding {
    padding: 0px 0px 100px !important; 
}
</style>
        <div class="">
            <div class="breadcumb-overlay" style="height: 20% !important;"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcrumb text-center">
                            <!--<div class="section-headline white-headline">-->
                            <!--    <h3>Blog Sidebar</h3>-->
                            <!--</div>-->
                            <!--<ul class="breadcrumb-bg">-->
                            <!--    <li class="home-bread">Home</li>-->
                            <!--    <li>Blog Sidebar</li>-->
                            <!--</ul>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End breadcumb Area -->
         <!--Blog Area Start-->
        <div class="blog-area fix page-padding">
            <div class="container blogcontainer">
                <div class="row">
                  
                    <div class="blog-details">
						<div class="col-md-12 col-sm-12 col-xs-12">
				
							<!-- single-blog start -->
							<article class="blog-post-wrapper">
								<div class="blog-banner">
									<a href="#" class="blog-images">
									 @if(filter_var($data->image, FILTER_VALIDATE_URL))
                                    
                                    
                                    <img src="{{ $data->image }}" />
                                    
                                    @else
                                        <img src="{{url('uploads/datatable/'.$data->image)}}" />
                                    @endif
                                    
									</a>
									<div class="blog-content" style="padding:0px;">
										<div class="blog-meta">
                                            <span class="admin-type">
                                                <i class="fa fa-user"></i>
                                                Admin
                                            </span>
                                            <span class="date-type">
                                               <i class="fa fa-calendar"></i>
                                                {{date('j M Y',strtotime($data->created_at))}}
                                            </span>
                                       
                                        </div>
										<h4>{{$data->total_amount}}</h4>
										
										
												      	<div class="col-md-4 col-sm-4" style="
    margin-bottom: 26px;">
                    	     <select class="livesearch form-control p-3" name="livesearch"></select>
                    	</div>
										
									 
										
										
										
				  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="">
                            <div class="">
                             
                                
                                <div class="">
                                    
                                    
                                    
                                    <div class="row">
                                        
                                        <div class="col-lg-8">
                                            
                                              <table class="table table-striped">
                                        <tr>
                                            <th>Aspect</th>
                                            
                                            <th>{{$list->sub_categroy}}</th>
                                             <th>{{$listt->sub_categroy}}</th>
                                           
                                        </tr>
                                        
                        @foreach($product_attrss as $demo)
                        
                        
                        
                        
    @php
    

    
        // Find the corresponding element in the $product_attrs collection
        $de = $product_attrs->firstWhere('color_id', $demo->color_id);
    @endphp

    <tr>
        <td>{{$demo->color_id}}</td>
        <td>{{$demo->images}}</td>
        <td>{{$de ? $de->images : ''}}</td>
    </tr>
@endforeach


                                       
                                    </table>
                                            
                                            
                                            
                                            
                                            
                                        </div>
                                        
                                          <div class="col-lg-4">
                                                <table class="table table-striped">
                                        <tbody id="here">
                                          
                                          
                                          
                                          
                                            
                                        </tbody>
                                    </table>
                                              
                                              
                                          </div>
                                        
                                    </div>
                                    
                                    
                                    
                                  
                                    
                                   
                                    
                               
                                    
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
									</div>
								</div>
							</article>
						
							<!-- single-blog end -->
						</div>
                        <!-- Start Right Sidebar blog -->
					
                    </div>
                    <!-- End Right Sidebar -->
                </div>
                <!-- End row -->
            </div>
        </div>
        <!--End of Blog Area-->
        
             
       <script type="text/javascript">
    $('.livesearch').select2({
        placeholder: 'Select',
        ajax: {
            url: 'https://theextraweb.com/Work/comparisionLaravel/ajax-autocomplete-search',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
               
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.sub_categroy,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
  
    });
    
    
    
   $('.livesearch').change(function(){
       
     var x = $(this).val();  
       
       $.ajax({    
            type: 'GET',
            url: 'https://theextraweb.com/Work/comparisionLaravel/ajax-search/'+x,
            success:function(data){
                
                $('#here').html(data);
            },
            error:function(data){
                  $('#here').html('');
            }
        });  
       
       
       
       
   }) 
    
    
    
    
     
</script>
       @endsection
       
       
       
    
  