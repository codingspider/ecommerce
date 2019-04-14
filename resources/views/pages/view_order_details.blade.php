<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')
<!-- Your custom  HTML goes here -->


@foreach ($orderby as $item)
    
@endforeach

    <div class="col-xs-6">
            <h2 class="sub-header">Customer Details</h2>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th class="col-md-1"> Name</th>
                    <th class="col-md-2">Email</th>
                    <th class="col-md-3">Phone</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <td class="col-md-1">{{ $item->name }}</td>
                  <td class="col-md-1">{{ $item->email }}</td>
                  <td class="col-md-1">{{ $item->phone }}</td>
                   
                  </tr>
                 
                </tbody>
              </table>
            </div>
    </div>
    
    <div class="col-xs-6">
            <h2 class="sub-header">Shiping Details</h2>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th class="col-md-1"> Name</th>
                    <th class="col-md-2">Last Name </th>
                    <th class="col-md-3">Address</th>
                    <th class="col-md-3">Phone</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                        <td class="col-md-1">{{ $item->first_name }}</td>
                        <td class="col-md-1">{{ $item->last_name }}</td>
                        <td class="col-md-1">{{ $item->address }}</td>
                        <td class="col-md-1">{{ $item->phone }}</td>
              
                  </tr>
             
                </tbody>
              </table>
            </div>
    </div>
<br><br>
  
<div class="col-xs-12">
        <h2 class="sub-header">Customer Details</h2>
        <div class="table-responsive">
          <table class="table table-striped">
                      <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Quantity</th>
                        <th scope="col">Product Price</th>
                        <th scope="col">Product Sub Total</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderby as $item)
                            
                      
                      <tr>
                      <th scope="row">{{ $item->order_id }}</th>
                      <th scope="row">{{ $item->product_name }}</th>
                      <th scope="row">{{ $item->product_quantity }}</th>
                      <th scope="row">{{ $item->product_price*$item->product_quantity }}</th>
             
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4"> Vat With: </td>
                            <td> <strong>Total:    {{ $item->order_total }} TK. </strong> </td>
                        </tr>
                    </tfoot>

                  </table>
                </div>
                </div>

</form>
@endsection