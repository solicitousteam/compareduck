@extends('include.master')
@section('contant')

<div class="page-wrapper">
			<div class="page-content">

            <div class="container-fluid">
 

 <div class="row">

	<div class="col-lg-12">
          <div class="card">

          <div class="row">
          <div class="col-md-6"> <h5 class="card-header text-uppercase"> {{$user['companynames']}} Details </h5></div>
          </div>
		 
         
            <div class="card-body">
              
			<div class="table-responsive">
	          <table class="table table-bordered">
            <thead>
              <tr>
                <th>User Name</th>
                <td>{{$user['username']}}</td>
              </tr>

			  
			  <tr>
                <th>Mobile Number </th>
                <td>{{$user['mobile']}}</td>
              </tr>
              <tr>
                <th>E-mail </th>
                <td>{{$user['email']}}</td>
              </tr>
              
                 <tr>
                <th>City</th>
                <td>{{$user['city']}}</td>
              </tr>
              
              
                     
                 <tr>
                <th>State</th>
                <td>{{$user['state']}}</td>
              </tr>
              
              
              <tr>
                <th>Profile Image</th>
                @if($user->image != null && $user->social_type !== 'google')
                <td><img src="{{url('uploads/Users/'.$user->image)}}" alt="user image" width="20%" style="border-radius:1em;"/></td>
                @elseif($user->social_type == 'google')
                <td><img src="{{$user->image}}" alt="user image" width="20%" style="border-radius:1em;"/></td>
                @else
                <td><img src="{{url('front_assest/assets/imgs/User/user.png')}}" alt="user image" width="20%"/></td>
                @endif

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
