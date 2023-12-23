@extends('include.front_master')
@section('content')
   
        <!-- Start Intro Area -->
		<div class="slide-area fix" data-stellar-background-ratio="0.6">
            <div class="display-table">
                <div class="display-table-cell">
					<div class="container">
						<div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <!-- Start Slider content -->
                                <div class="slide-content text-center">
                                    <h2 class="title2">Featured Comparisons
</h2>
                                    <!--<div class="layer-1-3">-->
                                    <!--    <a href="#" class="ready-btn left-btn" >Get started</a>-->
                                    <!--    <div class="video-content">-->
                                    <!--        <a href="https://www.youtube.com/watch?v=O33uuBh6nXA" class="video-play vid-zone">-->
                                    <!--            <i class="fa fa-play"></i>-->
                                    <!--            <span>watch video</span>-->
                                    <!--        </a>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                </div>
                                <!-- End Slider content -->
						    </div>
						</div>
					</div>
				</div>
            </div>
		</div>
		<!-- End Intro Area -->
        <!-- Start Count area -->
        <div class="counter-area fix area-padding-2">
      <style>
          li.suggestion {
    padding-top: 7px;
    margin-left: 7px;
    font-size: 20px;
}
      </style>
            <div class="container">
                <!-- Start counter Area -->
                
                <div class="row" style="    padding-bottom: 34px;
">
                                <form id="form" style="position: relative;
    left: 24%;">           
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          
                             <input type="search"  id="searchInput" class="form-control search_str" placeholder="Search Something...." style="    box-shadow: 0 0 6px 1px #e5e3e3 !important;
    width: 154%;
    padding: 30px 27px;
    font-size: 21px;
    border: none;"/>
                              <input type="hidden" id="selectedId" name="selected_id">
                             <ul id="suggestionsList"></ul>
                        </div>
                           <div class="col-md-3 col-sm-6 col-xs-12" style="margin-left: 60px;">
                        <button class="btn btn-success" id="searchButton" style="    padding: 18.5px 50px;
    border-radius: 0;">Search</button>
                        </div>
                        
                        </form>
                </div>
                 <div class="row">
                       
 @php
                     
                     $com = App\Models\order::orderBy('id','DESC')->paginate(9);
                     
                     @endphp
                     
                     @foreach($com as $list)
                
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <a href="data-details/{{$list->id}}"> 
                            <!-- fun_text  -->
                            <div class="fun_text">
                                <span class="counter-icon">
                                    
                                    @if(filter_var($list->image, FILTER_VALIDATE_URL))
                                    
                                    
                                    <img src="{{ $list->image }}" />
                                    
                                    @else
                                        <img src="{{url('uploads/datatable/'.$list->image)}}" />
                                    @endif
                                    
                                    
                                    
                                    
                                    
                                    
                                    </span>
                               
                            <h4 style="font-size: 19px;
	line-height: 50px;">{{$list->total_amount}}</h4></a>   
                            </div>
                            </a>  
                        </div>
                   
                
                    
                    @endforeach
                    
                     {{-- Pagination --}}
        <div class="d-flex justify-content-flex-end" >
            {!! $com->links("pagination::bootstrap-4") !!}
        </div>
                </div>
            </div>
        </div>
        <!-- End Count area -->
        <!-- Start Invest area -->
    <!--    <div class="invest-area bg-color area-padding-2">-->
    <!--        <div class="container">-->
    <!--            <div class="row">-->
				<!--	<div class="col-md-12 col-sm-12 col-xs-12">-->
				<!--		<div class="section-headline text-center">-->
    <!--                        <h3>The best investment plan</h3>-->
    <!--                        <p>Help agencies to define their new business objectives and then create professional software.</p>-->
				<!--		</div>-->
				<!--	</div>-->
				<!--</div>-->
    <!--            <div class="row">-->
    <!--                <div class="pricing-content">-->
    <!--                    <div class="col-md-3 col-sm-6 col-xs-12">-->
    <!--                        <div class="pri_table_list">-->
    <!--                            <div class="top-price-inner">-->
    <!--                               <div class="rates">-->
    <!--                                    <span class="prices">5%</span><span class="users">Daily</span>-->
    <!--                                </div>-->
    <!--                                <span class="per-day">10 days</span>-->
    <!--                            </div>-->
    <!--                            <ol class="pricing-text">-->
    <!--                                <li class="check">Minimam Invest : $100</li>-->
    <!--                                <li class="check">Maximam Invest : $1000</li>-->
    <!--                                <li class="check">Avarage Monthly : 50% </li>-->
    <!--                            </ol>-->
    <!--                            <div class="price-btn blue">-->
    <!--                                <a class="blue" href="#">Deposite</a>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="col-md-3 col-sm-6 col-xs-12">-->
    <!--                        <div class="pri_table_list">-->
    <!--                            <div class="top-price-inner">-->
    <!--                               <div class="rates">-->
    <!--                                    <span class="prices">15%</span><span class="users">Daily</span>-->
    <!--                                </div>-->
    <!--                                <span class="per-day">30 days</span>-->
    <!--                            </div>-->
    <!--                            <ol class="pricing-text">-->
    <!--                                <li class="check">Minimam Invest : $1000</li>-->
    <!--                                <li class="check">Maximam Invest : $10000</li>-->
    <!--                                <li class="check">Avarage Monthly :100% </li>-->
    <!--                            </ol>-->
    <!--                            <div class="price-btn blue">-->
    <!--                                <a class="blue" href="#">Deposite</a>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="col-md-3 col-sm-6 col-xs-12">-->
    <!--                        <div class="pri_table_list">-->
    <!--                            <div class="top-price-inner">-->
    <!--                               <span class="base">Popular</span>-->
    <!--                               <div class="rates">-->
    <!--                                    <span class="prices">50%</span><span class="users">Daily</span>-->
    <!--                                </div>-->
    <!--                                <span class="per-day">45 days</span>-->
    <!--                            </div>-->
    <!--                            <ol class="pricing-text">-->
    <!--                                <li class="check">Minimam Invest : $1000</li>-->
    <!--                                <li class="check">Maximam Invest : $50000</li>-->
    <!--                                <li class="check">Avarage Monthly : 200% </li>-->
    <!--                            </ol>-->
    <!--                            <div class="price-btn blue">-->
    <!--                                <a class="blue" href="#">Deposite</a>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="col-md-3 col-sm-6 col-xs-12">-->
    <!--                        <div class="pri_table_list">-->
    <!--                            <span class="base">Best sale</span>-->
    <!--                            <div class="top-price-inner">-->
    <!--                               <div class="rates">-->
    <!--                                    <span class="prices">100%</span><span class="users">Daily</span>-->
    <!--                                </div>-->
    <!--                                <span class="per-day">60 days</span>-->
    <!--                            </div>-->
    <!--                            <ol class="pricing-text">-->
    <!--                                <li class="check">Minimam Invest : $1000</li>-->
    <!--                                <li class="check">Maximam Invest : $50000</li>-->
    <!--                                <li class="check">Avarage Monthly : 250% </li>-->
    <!--                            </ol>-->
    <!--                            <div class="price-btn blue">-->
    <!--                                <a class="blue" href="#">Deposite</a>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
        <!-- End Invest area -->
        <!-- Start Support-service Area -->
    <!--    <div class="support-service-area fix area-padding-2">-->
    <!--        <div class="container">-->
    <!--            <div class="row">-->
				<!--	<div class="col-md-12 col-sm-12 col-xs-12">-->
				<!--		<div class="section-headline text-center">-->
    <!--                        <h3>Why choose investment plan</h3>-->
    <!--                        <p>Help agencies to define their new business objectives and then create professional software.</p>-->
				<!--		</div>-->
				<!--	</div>-->
				<!--</div>-->
    <!--            <div class="row">-->
    <!--                <div class="support-all">-->
                        <!-- Start About -->
    <!--                    <div class="col-md-6 col-sm-6 col-xs-12">-->
    <!--                        <div class="support-services wow ">-->
    <!--                            <a class="support-images" href="#"><i class="flaticon-023-management"></i></a>-->
    <!--                            <div class="support-content">-->
    <!--                                <h4>Expert management</h4>-->
    <!--                                <p>Replacing a  maintains the amount of lines. When replacing a selection. help agencies to define their new business objectives and then create</p>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
                        <!-- Start About -->
    <!--                    <div class="col-md-6 col-sm-6 col-xs-12">-->
    <!--                        <div class="support-services ">-->
    <!--                            <a class="support-images" href="#"><i class="flaticon-036-security"></i></a>-->
    <!--                            <div class="support-content">-->
    <!--                                <h4>Secure investment</h4>-->
    <!--                                <p>Replacing a  maintains the amount of lines. When replacing a selection. help agencies to define their new business objectives and then create</p>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
                        <!-- Start services -->
    <!--                    <div class="col-md-6 col-sm-6 col-xs-12">-->
    <!--                        <div class="support-services ">-->
    <!--                            <a class="support-images" href="#"><i class="flaticon-003-approve"></i></a>-->
    <!--                            <div class="support-content">-->
    <!--                                <h4>Registered company</h4>-->
    <!--                                <p>Replacing a  maintains the amount of lines. When replacing a selection. help agencies to define their new business objectives and then create</p>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
                        <!-- Start services -->
    <!--                    <div class="col-md-6 col-sm-6 col-xs-12">-->
    <!--                        <div class="support-services">-->
    <!--                            <a class="support-images" href="#"><i class="flaticon-042-wallet"></i></a>-->
    <!--                            <div class="support-content">-->
    <!--                                <h4>Instant withdrawal</h4>-->
    <!--                                <p>Replacing a  maintains the amount of lines. When replacing a selection. help agencies to define their new business objectives and then create</p>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
                        <!-- Start services -->
    <!--                    <div class="col-md-6 col-sm-6 col-xs-12">-->
    <!--                        <div class="support-services ">-->
    <!--                            <a class="support-images" href="#"><i class="flaticon-032-report"></i></a>-->
    <!--                            <div class="support-content">-->
    <!--                                <h4>Verified security</h4>-->
    <!--                                <p>Replacing a  maintains the amount of lines. When replacing a selection. help agencies to define their new business objectives and then create</p>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
                        <!-- Start services -->
    <!--                    <div class="col-md-6 col-sm-6 col-xs-12">-->
    <!--                        <div class="support-services">-->
    <!--                            <a class="support-images" href="#"><i class="flaticon-024-megaphone"></i></a>-->
    <!--                            <div class="support-content">-->
    <!--                                <h4>Live customer support</h4>-->
    <!--                                <p>Replacing a  maintains the amount of lines. When replacing a selection. help agencies to define their new business objectives and then create</p>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
        <!-- End Support-service Area -->
        <!-- Start Self-area -->
        <div class="self-area area-padding">
            <div class="container">
                <div class="row">
                    <!-- column end -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="self-content">
							<h4>We believe that making the right choices should be easier than it is today. We believe that this is possible with information that is unbiased, free, concise and easy to understand.</h4>
                            <span class="talk-text">Pritesh Kumar, CEO</span>
                        </div>
                    </div>
                    <!-- column end -->
                </div>
            </div>
        </div>
        <!-- End Self-area -->
        <!-- Start Work proses Area -->
        <div class="work-proses fix bg-color area-padding-2">
			<div class="container">
			    <div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="section-headline text-center">
                            <h3> Comparison Step</h3>
                            <p>Clearly define the purpose of the comparison.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<div class="work-proses-inner text-center">
							    <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="single-proses">
                                        <div class="proses-content">
                                            <div class="proses-icon point-blue">
                                                <span class="point-view">01</span>
                                                <a href="#"><i class="ti-briefcase"></i></a>
                                            </div>
                                            <div class="proses-text">
                                                <h4>Step 01 - Identify Choices</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End column -->
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="single-proses">
                                        <div class="proses-content">
                                            <div class="proses-icon point-orange">
                                               <span class="point-view">02</span>
                                                <a href="#"><i class="ti-layers"></i></a>
                                            </div>
                                            <div class="proses-text">
                                                <h4>Step 02 - Collect & Organize Data</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End column -->
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="single-proses last-item">
                                        <div class="proses-content">
                                            <div class="proses-icon point-green">
                                               <span class="point-view">03</span>
                                                <a href="#"><i class="ti-bar-chart-alt"></i></a>
                                            </div>
                                            <div class="proses-text">
                                                <h4>Step 03 - Get Desired Comparision</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End column -->
							</div>
						</div>
                    </div>
				</div>
			</div>
		</div>
        <!-- End Work proses Area -->
        <!--Start payment-history area -->
      {{--  <div class="payment-history-area bg-color fix area-padding-2">
            <div class="container">
               <div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="section-headline text-center">
                            <h3>Deposite and withdrawals history</h3>
                            <p>Help agencies to define their new business objectives and then create professional software.</p>
						</div>
					</div>
				</div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        @php
                        $cat = App\Models\category::where('status','1')->get();
                        
                        @endphp
                        

                        <div class="deposite-content">
                            <div class="diposite-box">
                                {{--
                                                      
                                                        <p>Choose Category</p>
                        <form>
                            @csrf
                            <select class="form-control" id="catagory">
                                <option>--Choose Category--</option>
                                
                                @foreach($cat as $list)
                                
                                  <option value="{{$list->id}}">{{$list->categroy}}</option>
                                @endforeach
                                
                            </select>
                            
                            <select name="subcategory" id="subcategory" value="{{old('subcategory')}}" class="form-control single-select">
<option value="">--Select Subcategroy type--</option>
</select> 

<h4>VS</h4>
                            <select name="subcategory" id="subcategoryy" value="{{old('subcategory')}}" class="form-control single-select">
<option value="">--Select Subcategroy type--</option>
</select> 
                        </form>
                        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" ></script>

                        <script type = "text/javascript">
	jQuery(document).ready(function(){
			jQuery('#catagory').change(function(){
				let cid=jQuery(this).val();
				jQuery.ajax({
					url:'getSubcatt',
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
   --}}
   <!--                             <h4>Last deposite</h4>-->
   <!--                     <span><i class="flaticon-005-savings"></i></span>-->
   <!--                             <div class="deposite-table">-->
   <!--                                 <table>-->
   <!--                                     <tr>-->
   <!--                                         <th>Name</th>-->
   <!--                                         <th>Date</th>-->
   <!--                                         <th>Amount</th>-->
   <!--                                         <th>Currency</th>-->
   <!--                                     </tr>-->
   <!--                                     <tr>-->
   <!--                                         <td>Admond sayhel</td>-->
   <!--                                         <td>Jan 02, 2020</td>-->
   <!--                                         <td>$1000</td>-->
   <!--                                         <td>Bitcoin</td>-->
   <!--                                     </tr>-->
   <!--                                     <tr>-->
   <!--                                         <td>Jonshon</td>-->
   <!--                                         <td>Dec 12, 2019</td>-->
   <!--                                         <td>$5000</td>-->
   <!--                                         <td>USD</td>-->
   <!--                                     </tr>-->
   <!--                                     <tr>-->
   <!--                                         <td>Hopper</td>-->
   <!--                                         <td>Dec 22, 2019</td>-->
   <!--                                         <td>$4000</td>-->
   <!--                                         <td>Ripple</td>-->
   <!--                                     </tr>-->
   <!--                                     <tr>-->
   <!--                                         <td>Admond sayhel</td>-->
   <!--                                         <td>Jan 02, 2020</td>-->
   <!--                                         <td>$3000</td>-->
   <!--                                         <td>Bitcoin</td>-->
   <!--                                     </tr>-->
   <!--                                     <tr>-->
   <!--                                         <td>Anjel july</td>-->
   <!--                                         <td>Jan 05, 2020</td>-->
   <!--                                         <td>$500</td>-->
   <!--                                         <td>USD</td>-->
   <!--                                     </tr>-->
   <!--                                     <tr>-->
   <!--                                         <td>Lagisha</td>-->
   <!--                                         <td>Jan 12, 2020</td>-->
   <!--                                         <td>$5000</td>-->
   <!--                                         <td>Bitcoin</td>-->
   <!--                                     </tr>-->
   <!--                                 </table>-->
   <!--                             </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
      
        <!-- End payment-history area -->
        <!-- Start Banner Area -->
        <div class="banner-area area-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="banner-all area-80 text-center">
                            <div class="banner-content">
                                <h3> Our compare website is your one-stop destination for side-by-side comparisons of products, services, and more.</h3>
                                <!--<a class="banner-btn" href="#">Sign up now</a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner Area -->
        <!-- Start Blog Area-->
    <!--    <div class="blog-area fix bg-color area-padding-2">-->
    <!--        <div class="container">-->
    <!--            <div class="row">-->
				<!--	<div class="col-md-12 col-sm-12 col-xs-12">-->
				<!--		<div class="section-headline text-center">-->
    <!--                        <h3>Global Comparing News</h3>-->
				<!--			<p>Dummy text is also used to demonstrate the appearance of different typefaces and layouts</p>-->
				<!--		</div>-->
				<!--	</div>-->
				<!--</div>-->
    <!--            <div class="row">-->
    <!--                <div class="blog-grid home-blog">-->
                        <!-- Start single blog -->
    <!--                    <div class="col-md-4 col-sm-6 col-xs-12">-->
    <!--                        <div class="single-blog">-->
    <!--                           <div class="blog-image">-->
				<!--					<a class="image-scale" href="#">-->
				<!--						<img src="img/blog/b1.jpg" alt="">-->
				<!--					</a>-->
				<!--				</div>-->
    <!--                            <div class="blog-content">-->
    <!--                               <div class="blog-meta">-->
    <!--                                    <span class="admin-type">-->
    <!--                                        <i class="fa fa-user"></i>-->
    <!--                                        Admin-->
    <!--                                    </span>-->
    <!--                                    <span class="date-type">-->
    <!--                                        <i class="fa fa-calendar"></i>-->
    <!--                                        20 july, 2023-->
    <!--                                    </span>-->
    <!--                                    <span class="comments-type">-->
    <!--                                        <i class="fa fa-comment-o"></i>-->
    <!--                                        13-->
    <!--                                    </span>-->
    <!--                                </div>-->
    <!--                                <a href="#">-->
    <!--                                    <h4>Creative design clients response is better</h4>-->
    <!--                                </a>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
                        <!-- End single blog -->
                        <!-- Start single blog -->
    <!--                    <div class="col-md-4 col-sm-6 col-xs-12">-->
    <!--                        <div class="single-blog">-->
    <!--                            <div class="blog-content">-->
    <!--                               <div class="blog-meta">-->
    <!--                                   <span class="admin-type">-->
    <!--                                        <i class="fa fa-user"></i>-->
    <!--                                        Admin-->
    <!--                                    </span>-->
    <!--                                    <span class="date-type">-->
    <!--                                       <i class="fa fa-calendar"></i>-->
    <!--                                        13 may, 2023-->
    <!--                                    </span>-->
    <!--                                    <span class="comments-type">-->
    <!--                                        <i class="fa fa-comment-o"></i>-->
    <!--                                        16-->
    <!--                                    </span>-->
    <!--                                </div>-->
    <!--                                <a href="#">-->
    <!--                                    <h4>Web development is a best work in future world</h4>-->
    <!--                                </a>-->
    <!--                            </div>-->
    <!--                            <div class="blog-image">-->
				<!--					<a class="image-scale" href="#">-->
				<!--						<img src="img/blog/b2.jpg" alt="">-->
				<!--					</a>-->
				<!--				</div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="col-md-4 col-sm-6 col-xs-12">-->
    <!--                        <div class="single-blog">-->
    <!--                            <div class="blog-image">-->
				<!--					<a class="image-scale" href="#">-->
				<!--						<img src="img/blog/b3.jpg" alt="">-->
				<!--					</a>-->
				<!--				</div>-->
    <!--                            <div class="blog-content">-->
    <!--                               <div class="blog-meta">-->
    <!--                                    <span class="admin-type">-->
    <!--                                        <i class="fa fa-user"></i>-->
    <!--                                        Admin-->
    <!--                                    </span>-->
    <!--                                    <span class="date-type">-->
    <!--                                       <i class="fa fa-calendar"></i>-->
    <!--                                        24 april, 2023-->
    <!--                                    </span>-->
    <!--                                    <span class="comments-type">-->
    <!--                                        <i class="fa fa-comment-o"></i>-->
    <!--                                        07-->
    <!--                                    </span>-->
    <!--                                </div>-->
    <!--                                <a href="#">-->
    <!--                                    <h4>You can trust me and business with together</h4>-->
    <!--                                </a>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
                        <!-- End single blog -->
    <!--                    <div class="col-md-4 col-sm-6 col-xs-12">-->
    <!--                        <div class="single-blog">-->
    <!--                            <div class="blog-content">-->
    <!--                                <div class="blog-meta">-->
    <!--                                    <span class="admin-type">-->
    <!--                                        <i class="fa fa-user"></i>-->
    <!--                                        Admin-->
    <!--                                    </span>-->
    <!--                                    <span class="date-type">-->
    <!--                                       <i class="fa fa-calendar"></i>-->
    <!--                                        28 june, 2023-->
    <!--                                    </span>-->
    <!--                                    <span class="comments-type">-->
    <!--                                        <i class="fa fa-comment-o"></i>-->
    <!--                                        32-->
    <!--                                    </span>-->
    <!--                                </div>-->
    <!--                                <a href="#">-->
    <!--                                    <h4>business man want to be benifit any way</h4>-->
    <!--                                </a>-->
    <!--                            </div>-->
    <!--                            <div class="blog-image">-->
				<!--					<a class="image-scale" href="#">-->
				<!--						<img src="img/blog/b4.jpg" alt="">-->
				<!--					</a>-->
				<!--				</div> -->
    <!--                        </div>-->
    <!--                    </div>-->
                        <!-- End single blog -->
    <!--                    <div class="col-md-4 col-sm-6 col-xs-12">-->
    <!--                        <div class="single-blog">-->
    <!--                            <div class="blog-image">-->
				<!--					<a class="image-scale" href="#">-->
				<!--						<img src="img/blog/b5.jpg" alt="">-->
				<!--					</a>-->
				<!--				</div>-->
    <!--                            <div class="blog-content">-->
    <!--                                <div class="blog-meta">-->
    <!--                                    <span class="admin-type">-->
    <!--                                        <i class="fa fa-user"></i>-->
    <!--                                        Admin-->
    <!--                                    </span>-->
    <!--                                    <span class="date-type">-->
    <!--                                       <i class="fa fa-calendar"></i>-->
    <!--                                        28 june, 2023-->
    <!--                                    </span>-->
    <!--                                    <span class="comments-type">-->
    <!--                                        <i class="fa fa-comment-o"></i>-->
    <!--                                        32-->
    <!--                                    </span>-->
    <!--                                </div>-->
    <!--                                <a href="#">-->
    <!--                                    <h4>business man want to be benifit any way</h4>-->
    <!--                                </a>-->
    <!--                            </div> -->
    <!--                        </div>-->
    <!--                    </div>-->
                        <!-- End single blog -->
    <!--                    <div class="col-md-4 col-sm-6 col-xs-12">-->
    <!--                        <div class="single-blog">-->
    <!--                            <div class="blog-content">-->
    <!--                                <div class="blog-meta">-->
    <!--                                    <span class="admin-type">-->
    <!--                                        <i class="fa fa-user"></i>-->
    <!--                                        Admin-->
    <!--                                    </span>-->
    <!--                                    <span class="date-type">-->
    <!--                                       <i class="fa fa-calendar"></i>-->
    <!--                                        28 june, 2023-->
    <!--                                    </span>-->
    <!--                                    <span class="comments-type">-->
    <!--                                        <i class="fa fa-comment-o"></i>-->
    <!--                                        32-->
    <!--                                    </span>-->
    <!--                                </div>-->
    <!--                                <a href="#">-->
    <!--                                    <h4>business man want to be benifit any way</h4>-->
    <!--                                </a>-->
    <!--                            </div>-->
    <!--                            <div class="blog-image">-->
				<!--					<a class="image-scale" href="#">-->
				<!--						<img src="img/blog/b6.jpg" alt="">-->
				<!--					</a>-->
				<!--				</div>-->
    <!--                        </div>-->
    <!--                    </div>-->
                        <!-- End single blog -->
    <!--                </div>-->
    <!--            </div>-->
                <!-- End row -->
        <!--    </div>-->
        <!--</div>-->
        <!-- End Blog Area-->
        <!-- Start reviews Area -->
        <div class="reviews-area fix area-padding">
            <div class="container">
                <div class="row">
                    <div class="reviews-top">
                        <!--<div class="col-md-5 col-sm-5 col-xs-12">-->
                        <!--    <div class="testimonial-inner">-->
                        <!--        <div class="review-head">-->
                        <!--            <h3>Our customer say about our company work</h3>-->
                        <!--            <p>At Compare Me Online, we're dedicated to simplifying your decision-making process through comprehensive comparison services. Our mission is to empower you with the knowledge and insights needed to make informed choices across various product and service categories.</p>-->
                        <!--            <a class="reviews-btn" href="review.html">More reviews</a>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="reviews-content">
                                <!-- start testimonial carousel -->
                                <div class="testimonial-carousel item-indicator">
                                    <div class="single-testi">
                                        <div class="testi-text">
                                            <div class="clients-text">
                                                <div class="client-rating">
                                                    <a href="#"><i class="ti-star"></i></a>
                                                    <a href="#"><i class="ti-star"></i></a>
                                                    <a href="#"><i class="ti-star"></i></a>
                                                    <a href="#"><i class="ti-star"></i></a>
                                                    <a href="#"><i class="ti-star"></i></a>
                                                </div>
                                                <p>"Navigating through various options was overwhelming until I found Compareduck. Their thorough comparisons helped me make an informed decision effortlessly. Thanks to them, I found exactly what I needed without the confusion."</p>
                                            </div>
                                            <div class="testi-img ">
                                                <img src="img/review/1.jpg" alt="">
                                                <div class="guest-details">
                                                    <h4>Sushant Pawar</h4>
                                                    <span class="guest-rev">Clients - <a href="#">General customer</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End single item -->
                                    <div class="single-testi">
                                        <div class="testi-text">
                                            <div class="clients-text">
                                                <div class="client-rating">
                                                    <a href="#"><i class="ti-star"></i></a>
                                                    <a href="#"><i class="ti-star"></i></a>
                                                    <a href="#"><i class="ti-star"></i></a>
                                                    <a href="#"><i class="ti-star"></i></a>
                                                    <a href="#"><i class="ti-star"></i></a>
                                                </div>
                                                <p>"As a busy professional, I don't have hours to spend comparing products. Thankfully, Compareduck did the work for me. Their detailed comparisons gave me a clear picture of my options, and I was able to make a confident choice quickly."</p>
                                            </div>
                                            <div class="testi-img ">
                                                <img src="img/review/2.jpg" alt="">
                                                <div class="guest-details">
                                                    <h4>Neha Roy</h4>
                                                    <span class="guest-rev">Clients - <a href="#">General customer</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End single item -->
                                    <div class="single-testi">
                                        <div class="testi-text">
                                            <div class="clients-text">
                                                <div class="client-rating">
                                                    <a href="#"><i class="ti-star"></i></a>
                                                    <a href="#"><i class="ti-star"></i></a>
                                                    <a href="#"><i class="ti-star"></i></a>
                                                    <a href="#"><i class="ti-star"></i></a>
                                                    <a href="#"><i class="ti-star"></i></a>
                                                </div>
                                                <p>"I've often felt uncertain about which products to choose, but Compareduck changed that. Their unbiased comparisons are a breath of fresh air in a market filled with biased reviews. I trust their insights wholeheartedly."</p>
                                            </div>
                                            <div class="testi-img ">
                                                <img src="img/review/3.jpg" alt="">
                                                <div class="guest-details">
                                                    <h4>Prem Desai</h4>
                                                    <span class="guest-rev">Clients - <a href="#">General customer</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End single item -->
                                    <div class="single-testi">
                                        <div class="testi-text">
                                            <div class="clients-text">
                                                <div class="client-rating">
                                                    <a href="#"><i class="ti-star"></i></a>
                                                    <a href="#"><i class="ti-star"></i></a>
                                                    <a href="#"><i class="ti-star"></i></a>
                                                    <a href="#"><i class="ti-star"></i></a>
                                                    <a href="#"><i class="ti-star"></i></a>
                                                </div>
                                                <p>"I used to dread making decisions, especially when faced with numerous options. Thanks to Compareduck, decision-making has become a breeze. Their clear and concise comparisons have turned my confusion into clarity."</p>
                                            </div>
                                            <div class="testi-img ">
                                                <img src="img/review/4.jpg" alt="">
                                                <div class="guest-details">
                                                    <h4>Somaya Arora</h4>
                                                    <span class="guest-rev">Clients - <a href="#">General customer</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End single item -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End reviews Area -->
        <!-- Start FAQ area -->
    <!--    <div class="faq-area bg-color area-padding">-->
    <!--        <div class="container">-->
    <!--           <div class="row">-->
				<!--	<div class="col-md-12 col-sm-12 col-xs-12">-->
				<!--		<div class="section-headline text-center">-->
    <!--                        <h3>Some important FAQ</h3>-->
    <!--                        <p>Help agencies to define their new business objectives and then create professional software.</p>-->
				<!--		</div>-->
				<!--	</div>-->
				<!--</div>-->
    <!--            <div class="row">-->
                    <!-- Start Column Start -->
    <!--                <div class="col-md-7 col-sm-6 col-xs-12">-->
    <!--                    <div class="company-faq">-->
    <!--                        <div class="faq-full">-->
				<!--				<div class="faq-details">-->
				<!--					<div class="panel-group" id="accordion">-->
										<!-- Panel Default -->
				<!--						<div class="panel panel-default">-->
				<!--							<div class="panel-heading">-->
				<!--								<h4 class="check-title">-->
				<!--									<a data-toggle="collapse" class="active" data-parent="#accordion" href="#check1">-->
				<!--										<span class="acc-icons"></span>How to successful our mission and vision-->
				<!--									</a>-->
				<!--								</h4>-->
				<!--							</div>-->
				<!--							<div id="check1" class="panel-collapse collapse in">-->
				<!--								<div class="panel-body">-->
				<!--									<p>-->
				<!--										When replacing a multi-lined selection of text, the generated dummy text maintains the amount of lines. When replacing a selection of text within a single line, the amount of words is roughly being maintained. -->
				<!--									</p>		-->
				<!--								</div>-->
				<!--							</div>-->
				<!--						</div>-->
										<!-- End Panel Default -->
										<!-- Panel Default -->
				<!--						<div class="panel panel-default">-->
				<!--							<div class="panel-heading">-->
				<!--								<h4 class="check-title">-->
				<!--									<a data-toggle="collapse" data-parent="#accordion" href="#check2">-->
				<!--										<span class="acc-icons"></span>Clients satisfaction make company Value.-->
				<!--									</a>-->
				<!--								</h4>-->
				<!--							</div>-->
				<!--							<div id="check2" class="panel-collapse collapse">-->
				<!--								<div class="panel-body">-->
				<!--									<p>-->
				<!--										When replacing a multi-lined selection of text, the generated dummy text maintains the amount of lines. When replacing a selection of text within a single line, the amount of words is roughly being maintained. -->
				<!--									</p>										-->
				<!--								</div>-->
				<!--							</div>-->
				<!--						</div>-->
										<!-- End Panel Default -->
										<!-- Panel Default -->
				<!--						<div class="panel panel-default">-->
				<!--							<div class="panel-heading">-->
				<!--								<h4 class="check-title">-->
				<!--									<a data-toggle="collapse" data-parent="#accordion" href="#check3">-->
				<!--										<span class="acc-icons"></span>World class creative design and development firm. -->
				<!--									</a>-->
				<!--								</h4>-->
				<!--							</div>-->
				<!--							<div id="check3" class="panel-collapse collapse ">-->
				<!--								<div class="panel-body">-->
				<!--									<p>-->
				<!--										When replacing a multi-lined selection of text, the generated dummy text maintains the amount of lines. When replacing a selection of text within a single line, the amount of words is roughly being maintained. -->
				<!--									</p>	-->
				<!--								</div>-->
				<!--							</div>-->
				<!--						</div>-->
										<!-- End Panel Default -->	
										<!-- Panel Default -->
				<!--						<div class="panel panel-default">-->
				<!--							<div class="panel-heading">-->
				<!--								<h4 class="check-title">-->
				<!--									<a data-toggle="collapse" data-parent="#accordion" href="#check4">-->
				<!--										<span class="acc-icons"></span>We are the best online flatform -->
				<!--									</a>-->
				<!--								</h4>-->
				<!--							</div>-->
				<!--							<div id="check4" class="panel-collapse collapse ">-->
				<!--								<div class="panel-body">-->
				<!--									<p>-->
				<!--										When replacing a multi-lined selection of text, the generated dummy text maintains the amount of lines. When replacing a selection of text within a single line, the amount of words is roughly being maintained. -->
				<!--									</p>	-->
				<!--								</div>-->
				<!--							</div>-->
				<!--						</div>-->
										<!-- End Panel Default -->
										<!-- Panel Default -->
				<!--						<div class="panel panel-default">-->
				<!--							<div class="panel-heading">-->
				<!--								<h4 class="check-title">-->
				<!--									<a data-toggle="collapse" data-parent="#accordion" href="#check5">-->
				<!--										<span class="acc-icons"></span>Clients satisfaction make company Value.-->
				<!--									</a>-->
				<!--								</h4>-->
				<!--							</div>-->
				<!--							<div id="check5" class="panel-collapse collapse">-->
				<!--								<div class="panel-body">-->
				<!--									<p>-->
				<!--										When replacing a multi-lined selection of text, the generated dummy text maintains the amount of lines. When replacing a selection of text within a single line, the amount of words is roughly being maintained. -->
				<!--									</p>										-->
				<!--								</div>-->
				<!--							</div>-->
				<!--						</div>-->
										<!-- End Panel Default -->										
				<!--					</div>-->
				<!--				</div>-->
								<!-- End FAQ -->
				<!--			</div>-->
    <!--                    </div>-->
    <!--                </div>-->
                    <!-- End Column -->
       <!--             <div class="col-md-5 col-sm-6 col-xs-12">-->
       <!--                 <div class="faq-content">-->
       <!--                 	<h4>Have a any qustion?</h4>-->
							<!--<div class="faq-quote">-->
							<!--	<div class="row">-->
							<!--		<form id="contactForm" method="POST" action="http://rockstheme.com/rocks/aievari-live/contact.php" class="contact-form">-->
							<!--			<div class="col-md-12 col-sm-12 col-xs-12">-->
							<!--				<input type="text" id="name" class="form-control" placeholder="Name" required data-error="Please enter your name">-->
							<!--				<div class="help-block with-errors"></div>-->
							<!--				<input type="email" class="email form-control" id="email" placeholder="Email" required data-error="Please enter your email">-->
							<!--				<div class="help-block with-errors"></div>-->
							<!--				<input type="text" id="msg_subject" class="form-control" placeholder="Subject" required="" data-error="Please enter your message subject">-->
							<!--				<div class="help-block with-errors"></div>-->
							<!--			</div>-->
							<!--			<div class="col-md-12 col-sm-12 col-xs-12">-->
							<!--				<textarea id="message" rows="7" placeholder="Massage" class="form-control" required data-error="Write your message"></textarea>-->
							<!--				<div class="help-block with-errors"></div>-->
							<!--				<button type="submit" id="submit" class="quote-btn">Submit</button>-->
							<!--				<div id="msgSubmit" class="h3 text-center hidden"></div> -->
							<!--				<div class="clearfix"></div>-->
							<!--			</div>   -->
							<!--		</form>-->
							<!--	</div>-->
							<!--</div>-->
       <!--                 </div>-->
       <!--             </div>-->
                    <!-- End Column -->
                </div>
            </div>
        </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#searchInput').on('input', function() {
            var query = $(this).val();

            $.get('search-suggestions', { query: query }, function(data) {
                $('#suggestionsList').empty();
               $.each(data, function(index, suggestion) {
    $('#suggestionsList').append('<li class="suggestion" data-id="' + suggestion.id + '">' + suggestion.total_amount + '</li>');
});
            });
        });

        $('#suggestionsList').on('click', '.suggestion', function() {
            var suggestionId = $(this).data('id');
            var suggestionValue = $(this).text();
            $('#searchInput').val(suggestionValue);
            $('#selectedId').val(suggestionId);
            $('#suggestionsList').empty();
             
        })

        $('#searchButton').on('click', function(e) {
            e.preventDefault(); // Prevent the default form submission

            var search_str = $('#selectedId').val();
            
            if(search_str !=''){
            var encodedSearchStr = encodeURIComponent(search_str);
            window.location.href = 'data-details/' + encodedSearchStr;
            }
        });
    });
</script>


        <!-- End FAQ area -->
       @endsection