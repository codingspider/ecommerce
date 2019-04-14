<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')
<!-- Your custom  HTML goes here -->

@foreach ($data as $item)
    
@endforeach

<?php

$order_total=DB::table('orders')->where('orders.customer_id',$item->customer_id)->count();


?>


<table class="table">
        <form action="{{ URL::to('multi/delete')}}" method="post">
            @csrf

    <thead class="thead-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Mark</th>
        <th scope="col">Customer Name</th>
        <th scope="col">Status</th>
        <th scope="col">Price</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
          @foreach ($orders as $value)
              
          
      <th scope="row">{{ $value->order_id}}</th>
      <th scope="row"><input type="checkbox" name="pid[]" value="{{$value->order_id}}"> </th>
      <th scope="row">{{ $value->cname}}</th>
      <th scope="row">{{ $value->order_status}}</th>
      <th scope="row">{{ $value->order_total}}</th>
     
       
      <td>
            <td><a class="btn btn-success" href="{{ URL::to('/view/order/details', $value->order_id)}}"> <i class="fa fa-view">View Details</i>
      @if($value->order_status == 'confirmed')
        
      <a class="btn btn-success" href="{{ URL::to('/cancel/order', $value->order_id)}}"> <i class="fa fa-thumbs-up"> </i>
        @else    
    <a class="btn btn-danger" href="{{ URL::to('/confirm/order', $value->order_id)}}"> <i class="fa fa-thumbs-down"></i></td>
         @endif   
        </tr>
        @endforeach
        </tbody>
    </table>
  <input type="submit" class="btn btn-danger" name="" value="Delete Multi">

</form>
@endsection