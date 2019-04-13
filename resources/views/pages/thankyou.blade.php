@extends('master')
@section('title', 'Thank You ')
@section('content')
<div class="jumbotron text-xs-center">
        <h1 class="display-3">Thank You!  </h1>
        <p class="lead"><strong>For Your Order</strong> one of our customer manager will contact you shortly.</p>
        <hr>
        <p>
          Having trouble? <a href="">Contact us</a>
        </p>
        <p class="lead">
        <a class="btn btn-primary btn-sm" href="{{URL::to('/home')}}" role="button">Continue to homepage</a>
        </p>
      </div>
    
@endsection