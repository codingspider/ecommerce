@extends('pages.mastertwo')
@section('title', 'Shopping Cart')


@section('content')
<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row ">
			<div class="shopping-cart">
				<div class="shopping-cart-table ">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th class="cart-romove item">Remove</th>
					<th class="cart-description item">Image</th>
					<th class="cart-product-name item">Product Name</th>
					<th class="cart-qty item">Quantity</th>
					
					<th class="cart-sub-total item">Subtotal</th>
					<th class="cart-total last-item">Grandtotal</th>
				</tr>
			</thead><!-- /thead -->

			<?php
                $data = Cart::content();

			?>
			<tfoot>
				@foreach ($data as $item)
						
	
			</tfoot>
			<tbody>
				<tr>
				<td class="romove-item"><a href="{{ URL::to('/delete/cart/prodotucs/'. $item->rowId) }}" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a></td>
					<td class="cart-image">
						<a class="entry-thumbnail" href="detail.html">
						    <img src="{{ $item->options->images }}" alt="">
						</a>
					</td>
					<td class="cart-product-name-info">
					<h4 class='cart-product-description'><a href="detail.html">{{ $item->name }}</a></h4>
						<div class="row">
							<div class="col-sm-4">
								<div class="rating rateit-small"></div>
							</div>
							<div class="col-sm-8">
								<div class="reviews">
									(06 Reviews)
								</div>
							</div>
						</div><!-- /.row -->
						<div class="cart-product-info">
											<span class="product-color">COLOR:<span>Blue</span></span>
						</div>
					</td>

                

							<td class="cart-product-grand-total"><span class="cart-grand-total-price">{{ Cart::count() }}</span></td>
							<td class="cart-product-sub-total"><span class="cart-sub-total-price">{{ $item->total }}</span></td>
							<td class="cart-product-grand-total"><span class="cart-grand-total-price">{{ $item->total }}</span></td>
							
				</tr>
				@endforeach

			</tbody><!-- /tbody -->
		</table><!-- /table -->
	</div>
</div><!-- /.shopping-cart-table -->	
<div >
    
    
        <form method="POST" action="{{ URL::to('ordered/placed') }}">
             @csrf
                        <!-- Group of material radios - option 1 -->
        <div class="form-check" >
                <input type="radio" class="form-check-input" value="bkash" name="groupOfMaterialRadios" checked>
                <label class="form-check-label" for="materialGroupExample1">Bkash</label>
              </div>
              
              <!-- Group of material radios - option 2 -->
              <div class="form-check">
                <input type="radio" class="form-check-input" value="cash-on-delivery" name="groupOfMaterialRadios" >
                <label class="form-check-label" for="materialGroupExample2">Cash on Delivery </label>
              </div>
              
              <!-- Group of material radios - option 3 -->
              <div class="form-check">
                <input type="radio" class="form-check-input" value="dutch-bangla" name="groupOfMaterialRadios">
                <label class="form-check-label" for="materialGroupExample3">Dutch Bangla</label>
              </div>
              <div class="form-check">
                    <input type="submit" value="Complete Order" class="form-check-input">
                </div>
        
         </form>
                        </div>		



<div class="col-md-12 cart-shopping-total">
	
        <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-md-6 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <h3 class="text-center">Payment Details</h3>
                                    
                                            <p class="column"> <a href="../html-link.htm"><img src="" style="hight:60px; width:60px;"></a>
                                                <a href="../html-link.htm"><img src="http://shorturl.at/lIPW2" style="hight:60px; width:80px;"> </a>
                                                <a href="../html-link.htm"> <img src="http://shorturl.at/cETY5" style="hight:60px; width:100px;"></a>
                                                <a href="../html-link.htm"> <img src="http://shorturl.at/klzWZ" style="hight:60px; width:100px;"></a>
                                                <a href="../html-link.htm"> <img src="http://shorturl.at/optw5" style="hight:50px; width:80px;"></a>
                                            </p>

                                         
                                </div>
                            </div>
                            <div class="panel-body">
                                <form role="form">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <label>CARD NUMBER</label>
                                                <div class="input-group">
                                                    <input type="tel" class="form-control" placeholder="Valid Card Number" />
                                                    <span class="input-group-addon"><span class="fa fa-credit-card"></span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-7 col-md-7">
                                            <div class="form-group">
                                                <label><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                                <input type="tel" class="form-control" placeholder="MM / YY" />
                                            </div>
                                        </div>
                                        <div class="col-xs-5 col-md-5 pull-right">
                                            <div class="form-group">
                                                <label>CV CODE</label>
                                                <input type="tel" class="form-control" placeholder="CVC" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <label>CARD OWNER</label>
                                                <input type="text" class="form-control" placeholder="Card Owner Names" />
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <button class="btn btn-success btn-lg btn-block">Process payment</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <style>
                .cc-img {
                    margin: 0 auto;
                }
            </style>
            
</div><!-- /.cart-shopping-total -->	


</div><!-- /.shopping-cart -->
		</div> <!-- /.row -->
@endsection