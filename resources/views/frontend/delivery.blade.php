@extends('frontend.layouts.app')
@section('title','HamroPasal | Delivery')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <!-- Content -->
  <div id="content"> 
    
    <!-- Ship Process -->
    <div class="ship-process padding-top-30 padding-bottom-30">
      <div class="container">
        <ul class="row">
          
          <!-- Step 1 -->
          <li class="col-sm-3">
            <div class="media-left"> <i class="fa fa-check"></i> </div>
            <div class="media-body"> <span>Step 1</span>
              <h6>Shopping Cart</h6>
            </div>
          </li>
         
          
          <!-- Step 3 -->
          <li class="col-sm-3 current">
            <div class="media-left"> <i class="flaticon-delivery-truck"></i> </div>
            <div class="media-body"> <span>Step 2</span>
              <h6>Delivery Address</h6>
            </div>
          </li>

          <!-- Step 4 -->
          <li class="col-sm-3">
            <div class="media-left"> <i class="fa fa-check"></i> </div>
            <div class="media-body"> <span>Step 3</span>
              <h6>Order Confirmation</h6>
            </div>
          </li>

          <!-- Step 3 -->
          <li class="col-sm-3">
            <div class="media-left"> <i class="fa fa-check"></i> </div>
            <div class="media-body"> <span>Step 4</span>
              <h6>Payment Methods</h6>
            </div>
          </li>
          
        </ul>
      </div>
    </div>
    
    <!-- Payout Method -->
    <section class="padding-bottom-60">
      <div class="container"> 
        <!-- Payout Method -->
        <div class="pay-method">
          <div class="row">
            <div class="col-md-12"> 
              
              <!-- Your information -->
              <div class="heading">
                <h2>Your information</h2>
                <hr>
              </div>
              <form method="post" action="{{ route('checkout.store')}}">
                @csrf
                <div class="row"> 
                  
                  <!-- Name -->
                     <div class="col-xs-6 col-sm-6 col-md-6">
                      <div class="form-group">
                          <strong>Full Name:</strong>
                          @guest
                          <input type="text" name="name" class="form-control" placeholder="Enter Your Name">
                          @else
                           <input type="text" name="name" class="form-control" placeholder="Enter Your Name" value="{{Auth::user()->name}}">
                           @endguest
                      </div>
                  </div> 
                  <!-- Card Number -->
                     <div class="col-xs-6 col-sm-6 col-md-6">
                      <div class="form-group">
                          <strong>Contact Number:</strong>
                          {!! Form::text('phone', null, array('placeholder' => 'Enter Your Phone Number','class' => 'form-control')) !!}
                      </div>
                  </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <div class="form-group">
                          <strong>E-mail:</strong>
                          @guest
                           <input type="text" name="email" class="form-control" placeholder="Enter Your email">
                           @else
                           <input type="text" name="email" class="form-control" placeholder="Enter Your email" value="{{Auth::user()->email}}">
                           @endguest
                      </div>
                  </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Location:</strong>
                            {!! Form::text('location', null, array('placeholder' => 'Enter Your Street, City','class' => 'form-control')) !!}
                        </div>
                    </div>
                  <!-- Address -->
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Address:</strong>
                        {!! Form::textarea('address', null, array('placeholder' => 'Enter Address','class' => 'form-control','rows' => 4, 'cols' => 54)) !!}
                    </div>
                </div>
                </div>
            </div>
          </div>
        </div>
        
        <!-- Button -->
        <div class="pro-btn">
         <a href="{{route('cart.index')}}" class="btn-round btn-light">Back to Cart</a> 
          <button class="btn-round"> Save and Continue</button>
         </div>

      </form>
      </div>
    </section>
    
    <!-- Clients img -->
    <section class="light-gry-bg clients-img">
      <div class="container">
        <ul>
          <li><img src="images/c-img-1.png" alt="" ></li>
          <li><img src="images/c-img-2.png" alt="" ></li>
          <li><img src="images/c-img-3.png" alt="" ></li>
          <li><img src="images/c-img-4.png" alt="" ></li>
          <li><img src="images/c-img-5.png" alt="" ></li>
        </ul>
      </div>
    </section>
    
    <!-- Newslatter -->
    <section class="newslatter">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h3>Subscribe our Newsletter <span>Get <strong>25% Off</strong> first purchase!</span></h3>
          </div>
          <div class="col-md-6">
            <form>
              <input type="email" placeholder="Your email address here...">
              <button type="submit">Subscribe!</button>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- End Content --> 
@endsection