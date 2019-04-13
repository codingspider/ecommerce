@extends('master')
@section('title', 'Product by category')

@section('content')


@foreach ($products as $item)

    
<div class="search-result-container ">
	<div id="myTabContent" class="tab-content category-list">
		<div class="tab-pane active " id="grid-container">
			
	<div class="category-product">

				<div class="row">									
						
<div class="col-sm-6 col-md-4 wow fadeInUp">
<div class="products">

<div class="product">		
<div class="product-image">
<div class="image">
<a href="detail.html"><img  src="{{ $item->images}}" style="width: 10px; hight: 150px;" alt=""></a>
</div><!-- /.image -->			


<div class="product-info text-left">
<h3 class="name"><a href="detail.html">{{ $item->name }}</a></h3>
<div class="rating rateit-small"></div>
<div class="description"></div>

<div class="product-price">	
<span class="price">
	${{ $item->price }}			</span>
					
</div><!-- /.product-price -->

</div><!-- /.product-info -->
	
</div><!-- /.product -->

</div><!-- /.products -->
</div><!-- /.item -->



<!-- /.product-list -->
</div><!-- /.products -->
</div><!-- /.category-product-inner -->


						
			</div><!-- /.category-product -->


		</div><!-- /.tab-pane #list-container -->
	</div><!-- /.tab-content -->
@endforeach
	

@endsection