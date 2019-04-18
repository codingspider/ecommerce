<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>@yield('title') | Coding Spider</title>

	    <!-- Bootstrap Core CSS -->
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
		
		<link rel="shortcut icon" href="https://apache.org/favicons/favicon-194x194.png" type="image/x-icon"/>
 <link rel="icon" href="https://apache.org/favicons/favicon-194x194.png" type="image/ico"/>

 {!! Html::style('css/style.css') !!}
	    
	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
	    <link rel="stylesheet" href="{{ asset('assets/css/blue.css') }}">
	    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/owl.transitions.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/rateit.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.min.css') }}">

		
		<style> 
				input[type=button], input[type=submit], input[type=reset] {
				  background-color: #4CAF50;
				  border: none;
				  color: white;
				  padding: 12px 32px;
				  text-decoration: none;
				  margin: 2px 2px;
				  cursor: pointer;
				}
				</style>

		

		
		<!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>


	</head>
    <body class="cnt-home">

		@php

				use App\Menus;


			$Menu =new Menus;

        

        try {

            $categories=$Menu->tree();

            

        } catch (Exception $e) {

            

            //no parent category found

		}
		
		


		@endphp
		<!-- ============================================== HEADER ============================================== -->
		<header class="header-style-1">
		<?php
		$data = Session::get('customer_id');

		$wishlist=  Cart::instance('wishlist')->count();
		
		?>

	<!-- ============================================== TOP MENU ============================================== -->
<div class="top-bar animate-dropdown">
	<div class="container">
		<div class="header-top-inner">
			<div class="cnt-account">
				<ul class="list-unstyled">
					<li><a href="#"><i class="icon fa fa-user"></i>My Account</a></li>

					@if($data != NULL && $wishlist == NULL)
					<li><a href="{{ URL::to('/home') }}"><i class="icon fa fa-heart"></i> {{ Cart::count() }} Wishlist</a></li>
					@elseif($data != NULL && $wishlist !== NULL)
					<li><a href="{{ URL::to('/show/wishlist') }}"><i class="icon fa fa-heart"></i> {{ Cart::count() }} Wishlist</a></li>
					@else
					<li><a href="{{ URL::to('/login/checkout') }}"><i class="icon fa fa-heart"></i> {{ Cart::count() }} Wishlist</a></li>
					@endif 



					<li><a href="{{ URL::to('/show/cart') }}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>

					<?php
					$data = Session::get('customer_id');
					$data_shipping_id = Session::get('shiping_id');
					?>
					@if($data != NULL && $data_shipping_id == NULL)
					<li><a href="{{ URL::to('/checkout') }}"><i class="icon fa fa-check"></i>Checkout</a></li>
					@elseif($data != NULL && $data_shipping_id != NULL)
					<li><a href="{{ URL::to('/payment/process') }}"><i class="icon fa fa-lock"></i>Checkout</a></li>
					@else
					<li><a href="{{ URL::to('/login/checkout') }}"><i class="icon fa fa-lock"></i>Checkout</a></li>
					@endif



					



					<?php
					$data = Session::get('customer_id');
					?>
					@if($data != NULL)
					<li><a href="{{ URL::to('/logout') }}"><i class="icon fa fa-lock"></i>logout</a></li>
					@else
					<li><a href="{{ URL::to('/login/checkout') }}"><i class="icon fa fa-lock"></i>login</a></li>
					@endif
				</ul>
			</div><!-- /.cnt-account -->


			<div class="clearfix"></div>
		</div><!-- /.header-top-inner -->
	</div><!-- /.container -->
</div><!-- /.header-top -->

<?php 
 $products= DB::table('products')
    ->join('categories', 'categories.id', '=', 'products.category_id')
    ->join('manufactures', 'manufactures.id', '=', 'products.manufacture_id')
    ->select('products.*', 'manufactures.name as maname', 'categories.name as caname', )
    ->where('products.status', '=',  1)
    ->get();
?>


<?php 
					
$hotdeals = DB::table('hot_deals')
->join('categories', 'categories.id', '=', 'hot_deals.category_id')
->join('manufactures', 'manufactures.id', '=', 'hot_deals.manufacture_id')
->select('hot_deals.*', 'manufactures.name as maname', 'categories.name as caname', )
->where('hot_deals.status', '=',  1)
->orderBy('created_at', 'desc')
->paginate(5);

		
		?>
<!-- ============================================== TOP MENU : END ============================================== -->
	<div class="main-header">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
					<!-- ============================================================= LOGO ============================================================= -->
<?php 
$weblogo = DB::table('web_logos')->where('status', 1)->orderBy('created_at', 'desc')->first();

?>
					<div class="logo">
	<a href="{{ URL::to('/home') }}">
		
	<img src="{{ $weblogo->images }}"  style="hight: 50px; width:50px" alt="">

	</a>
</div><!-- /.logo -->
<!-- ============================================================= LOGO : END ============================================================= -->				</div><!-- /.logo-holder -->

				<div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
					<!-- /.contact-row -->

					@php
					$cat_gory = DB::table('categories')->where('status', 1)
					
					->get();	

					@endphp
<!-- ============================================================= SEARCH AREA ============================================================= -->
<div class="search-area">
    <form>
        <div class="control-group">

         

            <input class="search-field" placeholder="Search here..." />

            <a class="search-button" href="#" ></a>    

        </div>
    </form>
</div><!-- /.search-area -->
<!-- ============================================================= SEARCH AREA : END ============================================================= -->				</div><!-- /.top-search-holder -->

				<div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
					<!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

	<div class="dropdown dropdown-cart">
		<a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
				<div class="items-cart-inner">
						<div class="basket">
								<i class="glyphicon glyphicon-shopping-cart"></i>
							</div>
						<div class="basket-item-count"><span class="count">{{ Cart::count() }}</span></div>
							<div class="total-price-basket">
								<span class="lbl">৳{{ Cart::total() }}</span>
								<span class="total-price">
									<span class="sign"></span><span class="value"></span>
								</span>
							</div>
							
						
						</div>
		</a>
		<ul class="dropdown-menu">
			<li>
				<div class="cart-item product-summary">
					<div class="row">
						<div class="col-xs-4">
							<div class="image">
								<a href="detail.html"><img src="assets/images/cart.jpg" alt=""></a>
							</div>
						</div>
						<div class="col-xs-7">
							
							<h3 class="name"><a href="index.php?page-detail">Simple Product</a></h3>
							<div class="price">$600.00</div>
						</div>
						<div class="col-xs-1 action">
							<a href="#"><i class="fa fa-trash"></i></a>
						</div>
					</div>
				</div><!-- /.cart-item -->
				<div class="clearfix"></div>
			<hr>
		
			<div class="clearfix cart-total">
				<div class="pull-right">
					
						<span class="text">Sub Total :</span><span class='price'>$600.00</span>
						
				</div>
				<div class="clearfix"></div>
					
				<a href="{{ URL::to('/login/checkout') }}" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>	
			</div><!-- /.cart-total-->
					
				
		</li>
		</ul><!-- /.dropdown-menu-->
	</div><!-- /.dropdown-cart -->

<!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->				</div><!-- /.top-cart-row -->
			</div><!-- /.row -->

		</div><!-- /.container -->

	</div><!-- /.main-header -->

	<!-- ============================================== NAVBAR ============================================== -->
<div class="header-nav animate-dropdown">
    <div class="container">
        <div class="yamm navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="nav-bg-class">

					<div class="main_menu_area hidden-xs light-blue darken-4 ">

							<div class="container">
				
								<div class="row">
				
									<div class="col-md-12">
				
										<div class="mainnmenu">
				
											<nav>
				
												<ul class="main-nagivation">
												<li><a href="{{URL::to('/home')}}">Home</a></li>
				
												@each('partials.index', $categories, 'category')
				
												</ul>
				
											</nav>
				
										</div>
				
									</div>
				
								</div>
				
							</div>
				
						</div>

            </div><!-- /.nav-bg-class -->
        </div><!-- /.navbar-default -->
    </div><!-- /.container-class -->

</div><!-- /.header-nav -->
<!-- ============================================== NAVBAR : END ============================================== -->

</header>

@include('pages.sidebar')



<!-- ============================================================= FOOTER ============================================================= -->
<footer id="footer" class="footer color-bg">


    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Contact Us</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
        <ul class="toggle-footer" style="">
            <li class="media">
                <div class="pull-left">
                     <span class="icon fa-stack fa-lg">
                            <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="media-body">
                    <p>ThemesGround, 789 Main rd, Anytown, CA 12345 USA</p>
                </div>
            </li>

              <li class="media">
                <div class="pull-left">
                     <span class="icon fa-stack fa-lg">
                      <i class="fa fa-mobile fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="media-body">
                    <p>+(888) 123-4567<br>+(888) 456-7890</p>
                </div>
            </li>

              <li class="media">
                <div class="pull-left">
                     <span class="icon fa-stack fa-lg">
                      <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="media-body">
                    <span><a href="#">flipmart@themesground.com</a></span>
                </div>
            </li>
              
            </ul>
    </div><!-- /.module-body -->
                </div><!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Customer Service</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="#" title="Contact us">My Account</a></li>
                <li><a href="#" title="About us">Order History</a></li>
                <li><a href="#" title="faq">FAQ</a></li>
                <li><a href="#" title="Popular Searches">Specials</a></li>
                <li class="last"><a href="#" title="Where is my order?">Help Center</a></li>
                        </ul>
                    </div><!-- /.module-body -->
                </div><!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Corporation</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                          <li class="first"><a title="Your Account" href="#">About us</a></li>
                <li><a title="Information" href="#">Customer Service</a></li>
                <li><a title="Addresses" href="#">Company</a></li>
                <li><a title="Addresses" href="#">Investor Relations</a></li>
                <li class="last"><a title="Orders History" href="#">Advanced Search</a></li>
                        </ul>
                    </div><!-- /.module-body -->
                </div><!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Why Choose Us</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="#" title="About us">Shopping Guide</a></li>
                <li><a href="#" title="Blog">Blog</a></li>
                <li><a href="#" title="Company">Company</a></li>
                <li><a href="#" title="Investor Relations">Investor Relations</a></li>
                <li class=" last"><a href="contact-us.html" title="Suppliers">Contact Us</a></li>
                        </ul>
                    </div><!-- /.module-body -->
                </div>
            </div>
        </div>
    </div>

    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-padding social">
                <ul class="link">
                  <li class="fb pull-left"><a target="_blank" rel="nofollow" href="#" title="Facebook"></a></li>
                  <li class="tw pull-left"><a target="_blank" rel="nofollow" href="#" title="Twitter"></a></li>
                  <li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="#" title="GooglePlus"></a></li>
                  <li class="rss pull-left"><a target="_blank" rel="nofollow" href="#" title="RSS"></a></li>
                  <li class="pintrest pull-left"><a target="_blank" rel="nofollow" href="#" title="PInterest"></a></li>
                  <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="#" title="Linkedin"></a></li>
                  <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="#" title="Youtube"></a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 no-padding">
                <div class="clearfix payment-methods">
                    <ul>
                        <li><img src="assets/images/payments/1.png" alt=""></li>
                        <li><img src="assets/images/payments/2.png" alt=""></li>
                        <li><img src="assets/images/payments/3.png" alt=""></li>
                        <li><img src="assets/images/payments/4.png" alt=""></li>
                        <li><img src="assets/images/payments/5.png" alt=""></li>
                    </ul>
                </div><!-- /.payment-methods -->
            </div>
        </div>
    </div>
</footer>
<!-- ============================================================= FOOTER : END============================================================= -->


	<!-- For demo purposes – can be removed on production -->
	
	
	<!-- For demo purposes – can be removed on production : End -->

	<!-- JavaScripts placed at the end of the document so the pages load faster -->
	<script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}"></script>
	
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	
	<script src="{{ asset('assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
	<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
	
	<script src="{{ asset('assets/js/echo.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.easing-1.3.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap-slider.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.rateit.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/lightbox.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
	<script src="{{ asset('assets/js/scripts.js') }}"></script>



	

</body>
</html>