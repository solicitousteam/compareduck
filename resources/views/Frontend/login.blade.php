@extends('include.front_master')
@section('content')
        <!-- Start breadcumb Area -->
        <div class="page-area">
            <div class="breadcumb-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcrumb text-center">
                            <div class="section-headline white-headline">
                                <h3>Login</h3>
                            </div>
                            <ul class="breadcrumb-bg">
                                <li class="home-bread">Home</li>
                                <li>Login</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End breadcumb Area -->
        <!-- Start Slider Area -->
        <div class="login-area page-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="login-page">
                            <div class="login-form">
                                <h4 class="login-title">LOGIN</h4>
                                <div class="row">
                                    <form id="contactForm" method="POST" action="http://rockstheme.com/rocks/aievari-live/contact.php" class="log-form">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="text" id="name" class="form-control" placeholder="Username" required data-error="Please enter your name">
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="password" id="msg_subject" class="form-control" placeholder="Password" required data-error="Please enter your message subject">
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="check-group flexbox">
                                                <label class="check-box">
                                                    <input type="checkbox" class="check-box-input" checked>
                                                    <span class="remember-text">Remember me</span>
                                                </label>

                                                <a class="text-muted" href="#">Forgot password?</a>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <button type="submit" id="submit" class="login-btn">Login</button>
                                            <div id="msgSubmit" class="h3 text-center hidden"></div> 
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="clear"></div>
                                            <div class="separetor"><span>Or with Sign</span></div>
                                            <div class="sign-icon">
                                                <ul>
                                                    <li><a class="facebook" href="#">Facebook</a></li>
                                                    <li><a class="twitter" href="#">twitter</a></li>
                                                    <li><a class="google" href="#">google+</a></li>
                                                </ul>
                                                <div class="acc-not">Don't have an account  <a href="signup.html"> Sign up</a></div>
                                            </div> 
                                        </div> 
                                    </form> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
        </div>
		<!-- all js here -->
          @endsection