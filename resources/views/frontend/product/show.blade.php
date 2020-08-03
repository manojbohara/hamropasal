@extends('frontend.layouts.app')
@section('title', $product->product_name)
@section('content')
 <div class="linking">
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="{{url('/')}}">Home</a></li>
        <li><a href="{{route('products.category',['category'=>$product->categories->slug])}}">{{$product->categories->name}}</a></li>
        @if($product->subcategories)
        <li><a href="{{route('products.subcategory',['category'=>$product->categories->slug,'subcategory'=>$product->subcategories->slug])}}">{{$product->subcategories->name}}</a></li>
        @endif
        <li class="active">{{ $product->product_name}}</li>
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
              
              @if($subcat->count())
              <h6>Subcategories</h6>
              <div class="checkbox checkbox-primary">
                <ul>
                  @forelse($subcat as $subcat)
                  <li>
                    <input id="cate1" class="styled" type="checkbox" >
                    <label for="cate1">{{ $subcat->name}}</label>
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
                <span id="price-min" class="price-min">20</span> <span id="price-max" class="price-max">80</span> <a href="#." class="btn-round" >Filter</a> </div>
              
              <!-- Featured Brands -->
              <h6>Featured Brands</h6>
              <div class="checkbox checkbox-primary">
                <ul>
                  <li>
                    <input id="brand1" class="styled" type="checkbox" >
                    <label for="brand1"> Apple <span>(217)</span> </label>
                  </li>
                  <li>
                    <input id="brand2" class="styled" type="checkbox" >
                    <label for="brand2"> Acer <span>(79)</span> </label>
                  </li>
                  <li>
                    <input id="brand3" class="styled" type="checkbox" >
                    <label for="brand3"> Asus <span>(283)</span> </label>
                  </li>
                  <li>
                    <input id="brand4" class="styled" type="checkbox" >
                    <label for="brand4">Samsung <span>(116)</span> </label>
                  </li>
                  <li>
                    <input id="brand5" class="styled" type="checkbox" >
                    <label for="brand5"> LG <span>(29)</span> </label>
                  </li>
                  <li>
                    <input id="brand6" class="styled" type="checkbox" >
                    <label for="brand6"> Electrolux <span>(179)</span> </label>
                  </li>
                  <li>
                    <input id="brand7" class="styled" type="checkbox" >
                    <label for="brand7"> Toshiba <span>(38)</span> </label>
                  </li>
                  <li>
                    <input id="brand8" class="styled" type="checkbox" >
                    <label for="brand8"> Sharp <span>(205)</span> </label>
                  </li>
                  <li>
                    <input id="brand9" class="styled" type="checkbox" >
                    <label for="brand9"> Sony <span>(35)</span> </label>
                  </li>
                </ul>
              </div>
              
              <!-- Rating -->
              <h6>Rating</h6>
              <div class="rating">
                <ul>
                  <li><a href="#."><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i> <span>(218)</span></a></li>
                  <li><a href="#."><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> <span>(178)</span></a></li>
                  <li><a href="#."><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> <span>(79)</span></a></li>
                  <li><a href="#."><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> <span>(188)</span></a></li>
                </ul>
              </div>
              
              <!-- Colors -->
              <h6>Size</h6>
              <div class="sizes"> <a href="#.">S</a> <a href="#.">M</a> <a href="#.">L</a> <a href="#.">XL</a> </div>
              
              <!-- Colors -->
              <h6>Colors</h6>
              <div class="checkbox checkbox-primary">
                <ul>
                  <li>
                    <input id="colr1" class="styled" type="checkbox" >
                    <label for="colr1"> Red <span>(217)</span> </label>
                  </li>
                  <li>
                    <input id="colr2" class="styled" type="checkbox" >
                    <label for="colr2"> Yellow <span> (179) </span> </label>
                  </li>
                  <li>
                    <input id="colr3" class="styled" type="checkbox" >
                    <label for="colr3"> Black <span>(79)</span> </label>
                  </li>
                  <li>
                    <input id="colr4" class="styled" type="checkbox" >
                    <label for="colr4">Blue <span>(283) </span></label>
                  </li>
                  <li>
                    <input id="colr5" class="styled" type="checkbox" >
                    <label for="colr5"> Grey <span> (116)</span> </label>
                  </li>
                  <li>
                    <input id="colr6" class="styled" type="checkbox" >
                    <label for="colr6"> Pink<span> (29) </span></label>
                  </li>
                  <li>
                    <input id="colr7" class="styled" type="checkbox" >
                    <label for="colr7"> White <span> (38)</span> </label>
                  </li>
                  <li>
                    <input id="colr8" class="styled" type="checkbox" >
                    <label for="colr8">Green <span>(205)</span></label>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          
          <!-- Products -->
          <div class="col-md-9">
            <div class="product-detail">
              <div class="product">
                <div class="row"> 
                  <!-- Slider Thumb -->
                  <div class="col-xs-5">
                    <article class="slider-item on-nav">
                      <div class="thumb-slider">
                        <ul class="slides">
                          <li data-thumb="{{ asset('hamropasal/product/'.$product->image) }}"> <img src="{{ asset('hamropasal/product/'.$product->image) }}" alt="Hamro Pasal Image" > 
                          </li>
                        </ul>
                      </div>
                    </article>
                  </div>
                  <!-- Item Content -->
                  <div class="col-xs-7"> <span class="tags">{{ $product->product_name}}</h5>
                    <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                    <div class="row">
                      <div class="col-sm-6"><span class="price">Rs {{ $product->discount_price}} </span></div>
                      <div class="col-sm-6">
                        <p>Availability: <span class="in-stock">
                        	@if($product->quantity > 0) 
                        	In Stock
                        	@else
                        	Out of Stock			
                        	@endif
                        </span></p>
                      </div>
                    </div>
                    <!-- List Details -->
                    <ul class="bullet-round-list">
                      <li>{{ $product->detail}}</li>
                    </ul>
                    <!-- Colors -->
                    <div class="row">
                    @if($product->produtcolor)
                      <div class="col-xs-5">
                        <div class="clr"> 
                     @foreach($product->produtcolor as $color)
                          <span style="background:{{ $color->colors->color_name }}"></span>
                          @endforeach
                        </div>
                      </div>
                      @endif
                      @if($product->produtsize)
                      <!-- Sizes -->
                      <div class="col-xs-7">
                        <div class="sizes"> 
                          @foreach($product->produtsize as $size)
                          <a href="#." class="active"> {{ $size->sizes->name }}</a>
                          @endforeach
                        </div>
                      </div>
                      @endif
                    </div>
                    <!-- Compare Wishlist -->
                    <ul class="cmp-list">
                      <li>
                        <form method="post" action="{{route('wishlist.store')}}">
                          @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                     <button type="submit"><i class="fa fa-heart"></i> Add to Wishlist</button>
                      </form>
                      </li>
                      <li><a href="#."><i class="fa fa-navicon"></i> Add to Compare</a></li>
                      <li><a href="#."><i class="fa fa-envelope"></i> Email to a friend</a></li>
                    </ul>
                   @if($product->quantity > 0) 
                    <!-- Quinty -->
                    <div class="quinty">
                      <input type="number" value="01">
                    </div>
                  <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                   <input type="hidden" value="{{ $product->id }}" id="id" name="id">
                    <input type="hidden" value="{{ $product->product_name }}" id="name" name="name">
                    <input type="hidden" value="{{ $product->discount_price }}" id="price" name="price">
                    <input type="hidden" value="{{ $product->image }}" id="image" name="image">
                    <input type="hidden" value="{{ $product->slug }}" id="slug" name="slug">
                    <input type="hidden" value="1" id="quantity" name="quantity">
                    <button class="btn-round">
                    <i class="icon-basket-loaded">
                      Add to Cart
                    </i>
                    </button>
                </form>
                @else
               <li><a href="#"><i class="fa fa-frown-o" aria-hidden="true" style="font-size: 20px;"></i> Product out of Stock</a> 
               </li>
                @endif
                  </div>
                </div>
              </div>
              
              <!-- Details Tab Section-->
              <div class="item-tabs-sec"> 
                
                <!-- Nav tabs -->
                <ul class="nav" role="tablist">
                  <li role="presentation" class="active"><a href="#pro-detil"  role="tab" data-toggle="tab">Product Details</a></li>
                  <li role="presentation"><a href="#cus-rev"  role="tab" data-toggle="tab">Customer Reviews</a></li>
                  <li role="presentation"><a href="#ship" role="tab" data-toggle="tab">Shipping & Payment</a></li>
                </ul>
                
                <!-- Tab panes -->
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="pro-detil"> 
                    <!-- List Details -->
                    <ul class="bullet-round-list">
                      <li>{{ $product->description}}</li>
                    </ul>
                  </div>
                  <div role="tabpanel" class="tab-pane fade in" id="cus-rev"> 
                      <h5>Hello</h5>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="cus-rev"></div>
                  <div role="tabpanel" class="tab-pane fade" id="ship"></div>
                </div>
              </div>
            </div>
            
            <!-- Related Products -->
            <section class="padding-top-30 padding-bottom-0"> 
              <!-- heading -->
              <div class="heading">
                <h2>Related Products</h2>
                <hr>
              </div>
              <!-- Items Slider -->
              <div class="item-slide-4 with-nav"> 
                <!-- Product -->
                @foreach($reletedProducts as $product)
                <div class="product">
                  <article> <img class="img-responsive" src="{{ asset('hamropasal/product/'.$product->image) }}" alt="" > 
                    <!-- Content --> 
                    <span class="tag">
                    	@if($product->subcategories)
                    	{{ $product->subcategories->name}}
                    	@else
                    	{{ $product->categories->name}}
                    	@endif
                    </span> 

                    <a href="{{route('products.show',['product' =>$product->slug])}}" class="tittle">{{ $product->product_name}}</a> 
                    <!-- Reviews -->
                    <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                    <div class="price">Rs {{ $product->discount_price}}</div>
                    <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                </div>
                <!-- Product -->
                @endforeach
              </div>
            </section>
          </div>
        </div>
      </div>
    </section>
    
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
@endsection