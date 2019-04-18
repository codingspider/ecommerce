@extends('master')

@section ('title', 'Wishlist')
@section('content')

    
    <div class="body-content">
        <div class="container">
            <div class="my-wishlist-page">
                <div class="row">
                    
                        @php
                            $data = Cart::instance('wishlist')->content();
                        @endphp
                    
                    <div class="col-md-10 my-wishlist">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th colspan="4" class="heading-title">My Wishlist</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ( $data as $item)
                    <tr>
                        <td class="col-md-2"><img src="{{ URL::asset($item->options->images) }}" style=" height: 100px; width:100px; alt="phoro"></td>
                        <td class="col-md-7">
                        <div class="product-name"><a href="#">{{ $item->name }}</a></div>
                            <div class="rating">
                                <i class="fa fa-star rate"></i>
                                <i class="fa fa-star rate"></i>
                                <i class="fa fa-star rate"></i>
                                <i class="fa fa-star rate"></i>
                                <i class="fa fa-star non-rate"></i>
                                <span class="review">( 06 Reviews )</span>
                            </div>
                            <div class="price">
                                    {{ $item->price }}
                               
                            </div>
                        </td>
                        <td class="col-md-2">
                            <form action="{{ URL::to('/switch/to/cart/') }}" method="POST">
                                @csrf
                                <input type="hidden" name="rowId" value="{{ $item->rowId }}">
                                   <button class="btn btn-info">Add To Cart </button>


                            </form>
                        </td>
                        <td class="col-md-1 close-btn">
                            <a href="#" class=""><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>		
    
</div><!-- /.row -->
            </div><!-- /.sigin-in-->   
        </div>
    </div>
<br>
<br>
<br>
@endsection