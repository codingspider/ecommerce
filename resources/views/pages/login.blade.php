@extends('pages.mastertwo')
@section('title', 'Login')
@section('content')
<div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <!-- Sign-in -->			
    <div class="col-md-6 col-sm-6 sign-in">
        <h4 class="">Sign in</h4>
        <p class="">Hello, Welcome to your account.</p>
        <div class="social-sign-in outer-top-xs">
            <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
            <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
        </div>
    <form method="POST" action="{{URL::to('/customer/login') }}" class="register-form outer-top-xs" role="form">
            @csrf
            <div class="form-group">
                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
            </div>
              <div class="form-group">
                <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                <input type="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" >
            </div>
            <div class="radio outer-xs">
               
                  <a href="#" class="forgot-password pull-right">Forgot your Password?</a>
            </div>
              <button type="submit" name="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
        </form>					
    </div>
    <!-- Sign-in -->
    
    <!-- create a new account -->
    <div class="col-md-6 col-sm-6 create-new-account">
        <h4 class="checkout-subtitle">Create a new account</h4>
        <p class="text title-tag-line">Create your new account.</p>
        <form method="Post" action="{{ URL::to('/customer/registration') }}" class="register-form outer-top-xs" role="form">
            @csrf
            <div class="form-group">
                <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail2" >
              </div>
            <div class="form-group">
                <label class="info-title" for="exampleInputEmail1">Full Name <span>*</span></label>
                <input type="text" name="name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
            </div>
            <div class="form-group">
                <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
                <input type="text" name="phone" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
            </div>
            <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Adresss <span>*</span></label>
                    <input type="text" name="address" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                </div>
            <div class="form-group">
                <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
                <input type="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
            </div>
            
              <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
        </form>
        
        
    </div>	
    <!-- create a new account -->			</div><!-- /.row -->
            </div><!-- /.sigin-in-->
    
@endsection