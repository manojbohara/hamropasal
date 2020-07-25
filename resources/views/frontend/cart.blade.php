@extends('frontend.layouts.app')
@section('title','HamroPasal | Shopping Cart')
@section('content')
 <div id="content"> 
   @include('sweetalert::alert')
    <!-- Ship Process -->
    <div class="ship-process padding-top-30 padding-bottom-30">
      <div class="container">
        <ul class="row">
          
          <!-- Step 1 -->
          <li class="col-sm-3 current">
            <div class="media-left"> <i class="flaticon-shopping"></i> </div>
            <div class="media-body"> <span>Step 1</span>
              <h6>Shopping Cart</h6>
            </div>
          </li>
          <!-- Step 2 -->
          <li class="col-sm-3">
            <div class="media-left"> <i class="flaticon-delivery-truck"></i> </div>
            <div class="media-body"> <span>Step 2</span>
              <h6>Delivery Methods</h6>
            </div>
          </li>
           <!-- Step 3 -->
          <li class="col-sm-3">
            <div class="media-left"> <i class="flaticon-business"></i> </div>
            <div class="media-body"> <span>Step 3</span>
              <h6>Payment Methods</h6>
            </div>
          </li>
          
          <!-- Step 4 -->
          <li class="col-sm-3">
            <div class="media-left"> <i class="fa fa-check"></i> </div>
            <div class="media-body"> <span>Step 4</span>
              <h6>Confirmation</h6>
            </div>
          </li>
        </ul>
      </div>
    </div>
    @if(\Cart::getTotalQuantity()>0)
    <!-- Shopping Cart -->
    <section class="shopping-cart padding-bottom-60">
      <div class="container">
        <table class="table">
          <thead>
            <tr>
              <th>Items</th>
              <th class="text-center">Price</th>
              <th class="text-center">Quantity</th>
              <th class="text-center">Total Price </th>
              <th>&nbsp; </th>
            </tr>
          </thead>
          <tbody>

           @foreach($cartCollection as $item)
            <!-- Item Cart -->
            <tr>
              <td>
              	<div class="media">
                  <div class="media-left"> <a href="#."> <img class="img-responsive" src="/hamropasal/product/{{ $item->attributes->image }}" alt="" > </a> </div>
                  <div class="media-body">
                    <p>{{ $item->name}}</p>
                  </div>
                </div>
            	</td>
              <td class="text-center padding-top-60">Rs {{ $item->price}}</td>
              <td class="text-center"><!-- Quinty -->
                
                <div class="quinty padding-top-20">
                  <input type="number" value="{{$item->quantity}}">
                </div></td>
              <td class="text-center padding-top-60">Rs {{ \Cart::get($item->id)->getPriceSum() }}</td>
              <td class="text-center padding-top-60">
              	 <form action="{{ route('cart.remove') }}" method="POST">
                  @csrf
                  <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                   <button  class="remove" style="margin-right: 10px;"><i class="fa fa-close"></i></button>
               </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        
        <!-- Promotion -->
        <div class="promo">
          @if(!session()->has('coupon'))
          <div class="coupen">
              {!! Form::open(array('route' => 'coupon.store','method'=>'POST')) !!}
              <label> Promotion Code
              <input type="text" placeholder="Your code here" name="coupon_code" id="coupon_code">
              <button type="submit"><i class="fa fa-arrow-circle-right"></i></button>
            </label>
            {!! Form::close() !!}
          </div>
          @else
          <label>Discount Applied</label>
          @endif
          <!-- Grand total -->
          <div class="g-totel">
            @if(session()->has('coupon'))
            <h5>Discount: {{ $discount}}</h5>
            <form method="post" action="{{route('coupon.destroy')}}">
              @csrf
              @method('delete')
            <button>remove coupon</button>
          </form>
            @endif
            <h5>Grand total: <span>Rs {{ $newTotal }}</span></h5>
          </div>
        </div>
        
        <!-- Button -->
        <div class="pro-btn"> <a href="{{url('/')}}" class="btn-round btn-light">Continue Shopping</a> 
        <a href="{{ route('delivery.index')}}" class="btn-round">Go Delivery Methods</a>  	
        </div>
      </div>
     </section>
     @else
     <p style="margin-left: 110px;"> You have no items in your shopping cart. </p>
     <a href="{{url('/')}}" class="btn-round btn-light" style = "margin-left: 110px; margin-bottom: 20px;">Continue Shopping</a>
    @endif
    
    <!-- Clients img -->
    <section class="light-gry-bg clients-img">
      <div class="container">
        <ul>
          <li><img src="/frontend/images/c-img-1.png" alt="" ></li>
          <li><img src="/frontend/images/c-img-2.png" alt="" ></li>
          <li><img src="/frontend/images/c-img-3.png" alt="" ></li>
          <li><img src="/frontend/images/c-img-4.png" alt="" ></li>
          <li><img src="/frontend/images/c-img-5.png" alt="" ></li>
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
@endsection