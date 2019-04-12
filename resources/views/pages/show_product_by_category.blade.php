@extends('master')
@section('title', 'Product by category')

@section('content')
    
<!-- ============================================== BEST SELLER ============================================== -->

<?php 

?>

<section class="section featured-product wow fadeInUp">
		<h3 class="section-title">New products</h3>
		<div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
				
<div class="item item-carousel">
	<div class="products">
			@foreach ($products as $item)
				
				
		<div class="product">		
			<div class="product-image">
				<div class="image">
				<a href="{{ URL::to('/products/details/'. $item->id) }}"><img  src="{{ $item->images }}" style=" height: 180px; width:100px alt=""></a>
				</div><!-- /.image -->			
	
										<div class="tag new"><span>New</span></div>		   
			</div><!-- /.product-image -->
				
			
			<div class="product-info text-left">
				<h3 class="name"><a href="detail.html">{{ $item->name }}</a></h3>
				<div class="rating rateit-small"></div>
				<div class="description"></div>
	
				<div class="product-price">	
					<span class="price">
							৳{{ $item->price }}			
						</span>
						
						<span class="price-before-discount"> </span>
												 
										
				</div><!-- /.product-price -->
				
			</div><!-- /.product-info -->
						<div class="cart clearfix animate-effect">
					<div class="action">
						<ul class="list-unstyled">
							<li class="lnk wishlist">
								<a class="add-to-cart" href="{{URL::to('/products/add/cart')}}" title="Wishlist">
									<i class="fa fa-shopping-cart"></i>													
								</a>
							</li>
						   
							<li class="lnk wishlist">
								<a class="add-to-cart" href="{{URL::to('/products/add/wishlist')}}" title="Wishlist">
									 <i class="icon fa fa-heart"></i>
								</a>
							</li>
	
							<li class="lnk">
							<a class="add-to-cart" href="{{URL::to('/products/details')}}" title="Compare">
									<i class="fa fa-signal" aria-hidden="true"></i>
								</a>
							</li>
						</ul>
					</div><!-- /.action -->
				</div><!-- /.cart -->
				</div><!-- /.product -->
				</div><!-- /.products -->
			</div><!-- /.item -->
		
			<div class="item item-carousel">
				<div class="products">
		  @endforeach	
					
		
		  
				</div><!-- /.products -->
			</div><!-- /.item -->


		
			<div class="item item-carousel">
				<div class="products">
					
		
		  
				</div><!-- /.products -->
			</div><!-- /.item -->
		
			<div class="item item-carousel">
				<div class="products">
					
		
		  
				</div><!-- /.products -->
			</div><!-- /.item -->
		
			<div class="item item-carousel">
				<div class="products">
					
		
		  
				</div><!-- /.products -->
			</div><!-- /.item -->
		
			<div class="item item-carousel">
				<div class="products">
					
		
		  
				</div><!-- /.products -->
			</div><!-- /.item -->
				</div><!-- /.home-owl-carousel -->
	</section><!-- /.section -->
<!-- ============================================== BEST SELLER : END ============================================== -->	

@endsection