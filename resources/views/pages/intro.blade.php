@extends('master')

@section('title', 'Home')

@section('content')

<div id="hero">
	<div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
		
	<div class="item" style="background-image: url(assets/Slider/IPHONE.jpg);">
			<div class="container-fluid">
				<div class="caption bg-color vertical-center text-left">
                    <div class="slider-header fadeInDown-1">Top Brands</div>
					<div class="big-text fadeInDown-1">
						New Collections
					</div>

					<div class="excerpt fadeInDown-2 hidden-xs">
					
					<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>

					</div>
					<div class="button-holder fadeInDown-3">
						<a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a>
					</div>
				</div><!-- /.caption -->
			</div><!-- /.container-fluid -->
		</div><!-- /.item -->
		<div class="item" style="background-image: url(assets/product/p28.jpg);">
			<div class="container-fluid">
				<div class="caption bg-color vertical-center text-left">
                    <div class="slider-header fadeInDown-1">Top Brands</div>
					<div class="big-text fadeInDown-1">
						Hot  Products 
					</div>

					<div class="excerpt fadeInDown-2 hidden-xs">
					
					<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>

					</div>
					<div class="button-holder fadeInDown-3">
						<a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a>
					</div>
				</div><!-- /.caption -->
			</div><!-- /.container-fluid -->
		</div><!-- /.item -->

		<div class="item" style="background-image: url(assets/Slider/20275086.jpg);">
			<div class="container-fluid">
				<div class="caption bg-color vertical-center text-left">
                 <div class="slider-header fadeInDown-1">Spring 2016</div>
					<div class="big-text fadeInDown-1">
						Women <span class="highlight">Fashion</span>
					</div>

					<div class="excerpt fadeInDown-2 hidden-xs">
						 
					<span>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</span>
					
					</div>
					<div class="button-holder fadeInDown-3">
						<a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a>
					</div>
				</div><!-- /.caption -->
			</div><!-- /.container-fluid -->
		</div><!-- /.item -->
		
		

	</div><!-- /.owl-carousel -->
</div>


<div class="info-boxes wow fadeInUp">
	<div class="info-boxes-inner">
		<div class="row">
			<div class="col-md-6 col-sm-4 col-lg-4">
				<div class="info-box">
					<div class="row">
						
						<div class="col-xs-12">
							<h4 class="info-box-heading green">money back</h4>
						</div>
					</div>	
					<h6 class="text">30 Days Money Back Guarantee</h6>
				</div>
			</div><!-- .col -->

			<div class="hidden-md col-sm-4 col-lg-4">
				<div class="info-box">
					<div class="row">
						
						<div class="col-xs-12">
							<h4 class="info-box-heading green">free shipping</h4>
						</div>
					</div>
					<h6 class="text">Shipping on orders over $99</h6>	
				</div>
			</div><!-- .col -->

			<div class="col-md-6 col-sm-4 col-lg-4">
				<div class="info-box">
					<div class="row">
						
						<div class="col-xs-12">
							<h4 class="info-box-heading green">Special Sale</h4>
						</div>
					</div>
					<h6 class="text">Extra $5 off on all items </h6>	
				</div>
			</div><!-- .col -->
		</div><!-- /.row -->
	</div><!-- /.info-boxes-inner -->
	
</div><!-- /.info-boxes -->

<!-- products starts here -->
<?php 
					
$products = DB::table('products')
->join('categories', 'categories.id', '=', 'products.category_id')
->join('manufactures', 'manufactures.id', '=', 'products.manufacture_id')
->select('products.*', 'manufactures.name as maname', 'categories.name as caname', )
->where('products.status', '=',  1)
->orderBy('id', 'desc')
->paginate(10);
		
		?>

<!-- ============================================== FEATURED PRODUCTS ============================================== -->
<section class="section featured-product wow fadeInUp">
		<h3 class="section-title">Featured products</h3>
		<div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
				
<div class="item item-carousel">
	<div class="products">
			@foreach ($products as $item)
				
		<div class="product">		
			<div class="product-image">
				<div class="image">
				<a href="{{ URL::to('/products/details/'. $item->id) }}"><img  src="{{ URL::asset($item->images) }}" style=" height: 180px; " alt=""></a>
				</div><!-- /.image -->			
	
										<div class="tag hot"><span>hot</span></div>		   
			</div><!-- /.product-image -->
				
			
			<div class="product-info text-left">
				<h3 class="name"><a href="detail.html">{{ $item->name }}</a></h3>
				<div class="rating rateit-small"></div>
				<div class="description"></div>
	
				<div class="product-price">	
					<span class="price">
							৳{{ $item->price }}			</span>
												 <span class="price-before-discount"> </span>
										
				</div><!-- /.product-price -->
				
			</div><!-- /.product-info -->
						<div class="cart clearfix animate-effect">
					<div class="action">
						<ul class="list-unstyled">
							<li class="lnk wishlist">
								<a class="add-to-cart" href="{{ URL::to('/products/details/'. $item->id) }}" title="add cart">
								<i class="fa fa-shopping-cart"></i>													
								</a>
							</li>
						   
							<li class="lnk wishlist">
								<a class="add-to-cart" href="{{ URL::to('/products/details/'. $item->id) }}" title="Wishlist">
									 <i class="icon fa fa-heart"></i>
								</a>
							</li>
	
							<li class="lnk">
							<a class="add-to-cart" href="{{URL::to('/products/details') }}" title="details">
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
	<!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
	<?php
	$discount = DB::table('discounts')->orderBy('created_at', 'desc')->first();

	?>
			<!-- ============================================== WIDE PRODUCTS ============================================== -->
<div class="wide-banners wow fadeInUp outer-bottom-xs">
		<div class="row">
	
			<div class="col-md-12">
				<div class="wide-banner cnt-strip">
					<div class="image">
					<img class="img-responsive" src="{{ $discount->images }}"  alt="">
					</div>	
					<div class="strip strip-text">
						<div class="strip-inner">
							<h2 class="text-right">New Mens Fashion<br>
							<span class="shopping-needs">Save up to 40% off</span></h2>
						</div>	
					</div>
					<div class="new-label">
						<div class="text">NEW</div>
					</div><!-- /.new-label -->
				</div><!-- /.wide-banner -->
			</div><!-- /.col -->
	
		</div><!-- /.row -->
	</div><!-- /.wide-banners -->
	<!-- ============================================== WIDE PRODUCTS : END 
		============================================== -->
			

	<!-- ============================================== New PRODUCTS ============================================== -->
<section class="section featured-product wow fadeInUp">
		<h3 class="section-title">New products</h3>
		<div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
				
<div class="item item-carousel">
	<div class="products">
			@foreach ($products as $item)
				
				
		<div class="product">		
			<div class="product-image">
				<div class="image">
				<a href="{{ URL::to('/products/details/'. $item->id) }}"><img  src="{{ URL::asset($item->images) }}" style=" height: 180px; alt=""></a>
				</div><!-- /.image -->			
	
										<div class="tag new"><span>New</span></div>		   
			</div><!-- /.product-image -->
				
			
			<div class="product-info text-left">
				<h3 class="name"><a href="detail.html">{{ $item->name }}</a></h3>
				<div class="rating rateit-small"></div>
				<div class="description"></div>
	
				<div class="product-price">	
					<span class="price">
							৳{{ $item->price }}			</span>
												 <span class="price-before-discount"> </span>
												 
										
				</div><!-- /.product-price -->
				
			</div><!-- /.product-info -->
						<div class="cart clearfix animate-effect">
					<div class="action">
						<ul class="list-unstyled">
							<li class="lnk wishlist">
								<a class="add-to-cart" href="{{ URL::to('/products/details/'. $item->id) }}" title="Wishlist">
									<i class="fa fa-shopping-cart"></i>													
								</a>
							</li>
						   
							<li class="lnk wishlist">
								<a class="add-to-cart" href="{{ URL::to('/products/details/'. $item->id) }}" title="Wishlist">
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
	<!-- ============================================== New PRODUCTS : END ============================================== -->

			
			















    
@endsection