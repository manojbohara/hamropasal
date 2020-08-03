<?php
use App\Model\Color;
$colors = Color::all();
?>
@extends('frontend.layouts.app')
@section('title' ,$categoryName)
@section('content')
 <div class="linking">
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">{{$categoryName}}</li>
      </ol>
    </div>
  </div>
  @include('sweetalert::alert')
  <!-- Content -->
  <div id="content"> 
    
    <!-- Products -->
    <section class="padding-top-40 padding-bottom-60">
      <div class="container">
        <div class="row"> 
          
          <!-- Shop Side Bar -->
          <div class="col-md-3">
            <div class="shop-side-bar"> 
              
              <!-- Categories -->
              @if($subcat->count())
              <h6>Subcategories</h6>
              <div class="checkbox checkbox-primary">
                <ul>
                  @forelse($subcat as $subcat)
                  <li>
                   <a href="{{route('products.subcategory',['subcategory'=>$subcat->slug])}}">
                    <label for="cate1">{{ $subcat->name}}</label>
                  </a>
                  </li>
                  @empty
                  @endforelse
                </ul>
              </div>
              @endif
              
              <!-- Categories -->
              <h6>Price</h6>
              <!-- PRICE -->
              <div class="cost-price-content">
                <div id="price-range" class="price-range"></div> 
                <input type="text" name="minprice" class="price-min" id="price-min">
                <input type="text" name="maxprice" class="price-max" id="price-max" >
                <button class="btn-round">Filter</button>
              </div>
              
              <!-- Colors -->
              <h6>Size</h6>
              <div class="sizes"> <a href="#.">S</a> <a href="#.">M</a> <a href="#.">L</a> <a href="#.">XL</a> </div>
              
              <!-- Colors -->
              <h6>Colors</h6>
              <div class="checkbox checkbox-primary">
                <ul>
                  @foreach($colors as $color)
                  <li>
                    <input id="colr1" class="styled" type="checkbox" >
                    <label for="colr1"> {{$color->color_name}} <span></span> </label>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          
          <!-- Products -->
          <div class="col-md-9"> 
            
            <!-- Short List -->
            <div class="short-lst">
              <h2>
              {{$categoryName}}
            </h2>
              <ul>
                <!-- Short List -->
                <li>
                  <p>Showing 1–12 of {{$products->count()}} results</p>
                </li>
                <!-- Short  -->
                <li >
                  <select class="selectpicker">
                    <option>Show 12 </option>
                    <option>Show 24 </option>
                    <option>Show 32 </option>
                  </select>
                </li>
                <!-- by Default -->
                <li>
                  @if(request()->routeIs('products.subcategory*'))
                  <a href="{{route('products.subcategory',['subcategory'=>request()->subcategory,'sort'=>'sort_by_default'])}}">Sort by Default </a>
                    <a href="{{route('products.subcategory',['subcategory'=>request()->subcategory,'sort'=>'low_high'])}}">Low to High </a>
                    <a href="{{route('products.subcategory',['subcategory'=>request()->subcategory,'sort'=>'high_low'])}}">High to Low </a>
                    @else
                    <a href="{{route('products.category',['category'=>request()->category,'sort'=>'sort_by_default'])}}">Sort by Default </a>
                    <a href="{{route('products.category',['category'=>request()->category,'sort'=>'low_high'])}}">Low to High </a>
                    <a href="{{route('products.category',['category'=>request()->category,'sort'=>'high_low'])}}">High to Low </a>
                    @endif
                </li>
                
                <!-- Grid Layer -->
                <li class="grid-layer"> <a href="#."><i class="fa fa-list margin-right-10"></i></a> <a href="#." class="active"><i class="fa fa-th"></i></a> </li>
                <li> 
                  <!-- Columns -->
                  <select class="selectpicker">
                    <option>4 Columns </option>
                    <option>3 Columns </option>
                    <option>5 Columns</option>
                  </select>
                </li>
              </ul>
            </div>
            
            <!-- Items -->
            <div class="item-col-4"> 
              <!-- Product -->
              @forelse ($products as $product)
              <div class="product">
                <article> <img class="img-responsive" src="{{ asset('hamropasal/product/'.$product->image) }}" alt="" > <span class="sale-tag">-25%</span> 
                  
                  <!-- Content --> 
                  <span class="tag">
                    @if($product->subcategories)
                    {{ $product->subcategories->name}}
                    @else
                    {{$product->categories->name}}
                    @endif
                  </span> <a href="{{route('products.show',['product' =>$product->slug])}}" class="tittle">{{ $product->product_name}}</a> 
                  <!-- Reviews -->
                  <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i> <span class="margin-left-10">5 Review(s)</span></p>
                  <div class="price">Rs {{ $product->discount_price}} <span>Rs {{ $product->original_price}}</span></div>
                  <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                   <input type="hidden" value="{{ $product->id }}" id="id" name="id">
                    <input type="hidden" value="{{ $product->product_name }}" id="name" name="name">
                    <input type="hidden" value="{{ $product->discount_price }}" id="price" name="price">
                    <input type="hidden" value="{{ $product->image }}" id="image" name="image">
                    <input type="hidden" value="{{ $product->slug }}" id="slug" name="slug">
                    <input type="hidden" value="1" id="quantity" name="quantity">
                    <button class="cart-btn">
                    <i class="icon-basket-loaded"></i>
                    </button>
                </form>
                </article>
              </div>
              @empty
                 <h6>No Product Found</h6>
              @endforelse
              <!-- pagination -->
              <ul class="pagination">
                
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Your Recently Viewed Items -->
    @include('frontend.layouts.recently-view')
    
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
<script src="{{ asset('frontend/js/vendors/jquery/jquery.min.js')}}"></script> 
<script src="{{ asset('frontend/js/vendors/jquery.nouislider.min.js')}}"></script> 
<script>
jQuery(document).ready(function($) {
  
  //  Price Filter ( noUiSlider Plugin)
    $("#price-range").noUiSlider({
    range: {
      'min': [ {{ $minprice}} ],
      'max': [ {{ $maxprice}} ]
    },
    start: [{{ $minprice}}, {{ $maxprice}}],
        connect:true,
        serialization:{
            lower: [
        $.Link({
          target: $("#price-min")
        })
      ],
      upper: [
        $.Link({
          target: $("#price-max")
        })
      ],
      format: {
      // Set formatting
        prefix: 'Rs'
      }
        }
  })
})

</script>
@endsection