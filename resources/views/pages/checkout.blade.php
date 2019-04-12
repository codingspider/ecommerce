@extends('pages.mastertwo')
@section('title', 'Checkout')

@section('content')

<div class="body-content">
        <div class="container">
            <div class="checkout-box ">
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel-group checkout-steps" id="accordion">
                            <!-- checkout-step-01  -->

    <!-- checkout-step-01  -->
                            <!-- checkout-step-02  -->
                              <div class="panel panel-default checkout-step-02">
                                <div class="panel-heading">
                                  <h4 class="unicase-checkout-title">
                                    <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo">
                                      <span>2</span>Billing Information
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                  <div class="panel-body">
                                      <!-- Material form register -->
<div class="card">

        <h5 class="card-header info-color white-text text-center py-4">
            <strong>Bill To </strong>
        </h5>
    
        <!--Card content-->
        <div class="card-body px-lg-5 pt-0">
    
            <!-- Form -->
            <form method="POST" action="{{URL::to('/shipping/save/details') }}" class="text-center" style="color: #757575;">
              @csrf
                <div class="form-row">
                    <div class="col">
                        <!-- First name -->
                        <div class="md-form">
                            <input type="text" name="firstname" class="form-control" placeholder="First Naame">
                            <label for="materialRegisterFormFirstName"></label>
                        </div>
                    </div>
                    <div class="col">
                        <!-- Last name -->
                        <div class="md-form">
                            <input type="text" name="lastname" class="form-control" placeholder="Laset Name">
                            <label for="materialRegisterFormLastName"></label>
                        </div>
                    </div>
                </div>
    
                <!-- E-mail -->
                <div class="md-form mt-0">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <label for="materialRegisterFormEmail"></label>
                </div>
    
                <!-- Password -->
                <div class="md-form">
                    <input type="text" class="form-control" name="address" placeholder="Address">
                    <label for="materialRegisterFormPassword"></label>
                 
                </div>
    
                <!-- Phone number -->
                <div class="md-form">
                    <input type="text" class="form-control" name="phone" placeholder="Phone Number">
                    <label for="materialRegisterFormPhone"></label>
                    
                </div>
                
                <input type="submit" class="btn btn-success">
            
            </form>
            <!-- Form -->
    
        </div>
    
    </div>
    <!-- Material form register -->
                                  </div>
                                </div>
                              </div>
                              <!-- checkout-step-02  -->
    
                            <!-- checkout-step-03  -->
                              <div class="panel panel-default checkout-step-03">
                                <div class="panel-heading">
                                  <h4 class="unicase-checkout-title">
                                    <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseThree">
                                           <span>3</span>Shipping Information
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                  <div class="panel-body">
                                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                  </div>
                                </div>
                              </div>
                              <!-- checkout-step-03  -->
    
                            <!-- checkout-step-04  -->
                            <div class="panel panel-default checkout-step-04">
                                <div class="panel-heading">
                                  <h4 class="unicase-checkout-title">
                                    <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseFour">
                                        <span>4</span>Shipping Method
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse">
                                    <div class="panel-body">
                                     Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </div>
                                </div>
                            </div>
                            <!-- checkout-step-04  -->
    
                            <!-- checkout-step-05  -->
                              <div class="panel panel-default checkout-step-05">
                                <div class="panel-heading">
                                  <h4 class="unicase-checkout-title">
                                    <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseFive">
                                        <span>5</span>Payment Information
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapseFive" class="panel-collapse collapse">
                                  <div class="panel-body">
                                   Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                  </div>
                                </div>
                            </div>
                            <!-- checkout-step-05  -->
    
                            <!-- checkout-step-06  -->
                              <div class="panel panel-default checkout-step-06">
                                <div class="panel-heading">
                                  <h4 class="unicase-checkout-title">
                                    <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseSix">
                                        <span>6</span>Order Review
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapseSix" class="panel-collapse collapse">
                                      <div class="panel-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                      </div>
                                </div>
                              </div>
                              <!-- checkout-step-06  -->
                              
                        </div><!-- /.checkout-steps -->
                    </div>
    
                    
                    <div class="col-md-4">
                        <!-- checkout-progress-sidebar -->
    <div class="checkout-progress-sidebar ">
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                </div>
                <div class="">
                    <ul class="nav nav-checkout-progress list-unstyled">
                        <li><a href="#">Billing Address</a></li>
                        <li><a href="#">Shipping Address</a></li>
                        <li><a href="#">Shipping Method</a></li>
                        <li><a href="#">Payment Method</a></li>
                    </ul>		
                </div>
            </div>
        </div>
    </div> 
    <!-- checkout-progress-sidebar -->				</div>
                </div><!-- /.row -->
            </div><!-- /.checkout-box -->

    
@endsection