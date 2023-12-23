<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{URL::asset('assets/images/favicon-32x32.png')}}" type="image/png" />
	<!-- loader-->
	<link href="{{URL::asset('assets/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{URL::asset('assets/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="{{URL::asset('assets/css/app.css')}}" rel="stylesheet">
	<link href="{{URL::asset('assets/css/icons.css')}}" rel="stylesheet">
			<script src="https://kit.fontawesome.com/da3af72861.js')}}" crossorigin="anonymous"></script>
	<title>Admin</title>
	
	<style>

.clock {
  margin-left:auto;
  margin-right:auto;
  width:800px;
  margin-top: 10%;
  color:#fff;

}

#Date {
  font-family: Arial, Helvetica, sans-serif;
  font-size:36px;
  text-align:center;
  text-shadow:0 0 5px #00c6ff;
}

ul {
  width:800px;
  margin:0 auto;
  padding:0px;
  list-style:none;
  text-align:center;
}

ul li {
  display:inline;
  font-size:3em;
  text-align:center;
  font-family:Arial, Helvetica, sans-serif;
  text-shadow:0 0 5px #00c6ff;
}

#point {
  position:relative;
  -moz-animation:mymove 1s ease infinite;
  -webkit-animation:mymove 1s ease infinite;
  padding-left:10px; padding-right:10px;
}

@-webkit-keyframes mymove 
{
0% {opacity:1.0; text-shadow:0 0 20px #00c6ff;}
50% {opacity:0; text-shadow:none; }
100% {opacity:1.0; text-shadow:0 0 20px #00c6ff; }    
}

@-moz-keyframes mymove 
{
0% {opacity:1.0; text-shadow:0 0 20px #00c6ff;}
50% {opacity:0; text-shadow:none; }
100% {opacity:1.0; text-shadow:0 0 20px #00c6ff; }    
}

.form_leyout{
        width: 34%;
    position: relative;
    left: 33%;

}
</style>
</head>

<body class="bg-lock-screen">
	<!-- wrapper -->
	<div class="wrapper">
		<div class="authentication-lock-screen d-flex align-items-center justify-content-center">
			<div class="card shadow-none bg-transparent">
			
				<div class="clock">
    <div id="Date"></div>
    <ul>
        <li id="hours"></li>
        <li id="point">:</li>
        <li id="min"></li>
        <li id="point">:</li>
        <li id="sec"></li>
    </ul>
</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<div class="card-body p-md-5 text-center">
					<div class="">
						<img src="{{URL::asset('assets/images/icons/user.png')}}" class="mt-5" width="120" alt="" />
					</div>
					<p class="mt-2 text-white">Administrator</p>
											<form action="{{ route('admin.check') }}" method="POST">
											    
                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                    @csrf
										
                                      @include('layouts.flash-message')
						<div class="mb-3 mt-3 form_leyout">
						<input type="email" name="email" class="form-control" placeholder="E-mail" />
					</div>
					<div class="mb-3 mt-3 form_leyout">
						<input type="password" name="password" class="form-control" placeholder="Password" />

					</div>
					<div class="d-grid form_leyout ">
						<button type="submit" name="submit" class="btn btn-success">Login</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
	
	<script>
$(document).ready(function() {
// Create two variables with names of months and days of the week in the array
var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]; 
var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

// Create an object newDate()
var newDate = new Date();
// Retrieve the current date from the Date object
newDate.setDate(newDate.getDate());
// At the output of the day, date, month and year    
$('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

setInterval( function() {
    // Create an object newDate () and extract the second of the current time
    var seconds = new Date().getSeconds();
    // Add a leading zero to the value of seconds
    $("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
    },1000);
    
setInterval( function() {
    // Create an object newDate () and extract the minutes of the current time
    var minutes = new Date().getMinutes();
    // Add a leading zero to the minutes
    $("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
    },1000);
    
setInterval( function() {
    // Create an object newDate () and extract the clock from the current time
    var hours = new Date().getHours();
    // Add a leading zero to the value of hours
    $("#hours").html(( hours < 10 ? "0" : "" ) + hours);
    }, 1000);
    
}); 
	</script>
	
</body>


</html>