@extends('frontend.layouts.app')
@section('content')
<?php 
 $cartCollection = \Cart::getContent();

?>
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
          <li class="col-sm-3">
            <div class="media-left"> <i class="fa fa-check"></i> </div>
            <div class="media-body"> <span>Step 2</span>
              <h6>Delivery Methods</h6>
            </div>
          </li>
          
          <!-- Step 4 -->
          <li class="col-sm-3 current">
            <div class="media-left"> <i class="fa fa-check"></i> </div>
            <div class="media-body"> <span>Step 3</span>
              <h6>Confirmation</h6>
            </div>
          </li>

          <!-- Step 2 -->
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
        <div class="pay-method check-out"> 
          
          <!-- Shopping Cart -->
          <div class="heading">
            <h2>Shopping Cart</h2>
            <hr>
          </div>

          @isset($order )
          <!-- Check Item List -->
          @foreach($order->products as $product)
          <ul class="row check-item">
            <li class="col-xs-6">
              <p>{{ $product->product_name}}</p>
            </li>
             <li class="col-xs-2 text-center">
              <p>{{ $product->discount_price}}</p>
            </li>
            @foreach($order->orderproduct as $qty)

            <li class="col-xs-2 text-center">
              <p>{{ $qty->quantity }} Items</p>
            </li>
            @endforeach
            <li class="col-xs-2 text-center">
              <p>Rs {{ \Cart::getSubTotal()}}</p>
            </li>
          </ul>
          @endforeach
          <!-- Delivery infomation -->
          <div class="heading margin-top-50">
            <h2>Delivery infomation</h2>
            <hr>
          </div>
          <!-- Information -->
          <ul class="row check-item infoma">
            <li class="col-sm-3">
              <h6>Name</h6>
              <span>{{ $order['name']}}</span> </li>
            <li class="col-sm-3">
              <h6>Phone</h6>
              <span>{{ $order['phone']}}</span> </li>
            <li class="col-sm-3">
              <h6>Email</h6>
              <span>{{ $order['email']}}</span> </li>
            <li class="col-sm-3">
              <h6>Location</h6>
              <span>{{ $order['location']}}</span> </li>
            <li class="col-sm-3">
              <h6>Address</h6>
              <span>{{ $order['address']}}</span> 
            </li>
          </ul>
          <!-- Totel Price -->
          <div class="totel-price">
            <h4><small> Total Price: </small> {{ $order['billing_total']}}</h4>
          </div>
        @endisset
        </div>
        
        <!-- Button -->
        <div class="pro-btn"> <a href="{{ url()->previous() }}" class="btn-round btn-light">Back to Delivery</a> 
         <a href="{{route('payment.index')}}"><button class="btn-round">Proceed to Payment</button></a>
        </div>
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