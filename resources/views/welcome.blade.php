@extends('frontend.layouts.app')
@section('title','HamroPasal - Online store in Nepal')
@section('content')
<body>

<!-- Page Wrapper -->
<div id="wrap" class="layout-9">   
  <!-- Slid Sec -->
  <section class="slid-sec">
    <div class="container">
      <div class="container-fluid">
        <div class="row"> 
          
          <!-- Main Slider  -->
          <div class="col-md-3 no-padding">
            <div class="cate-bar-in relative margin-top-0">
              <div id="cater">
                <ul>
                  @foreach($categories as $category)  
                  <li><a href="{{route('products.category',['category'=>$category->slug])}}"> {{ $category->name}}</a></li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          
          <!-- Main Slider  -->
          <div class="col-md-9 no-padding"> 
            
            <!-- Main Slider Start -->
            <div class="tp-banner-container">
              <div class="tp-banner with-bg-slide-all">
                <ul>
                  @foreach($sliders as $slider)
                  <li data-transition="random" data-slotamount="7" data-masterspeed="300"  data-saveperformance="off" > 
                    <!-- MAIN IMAGE --> 
                    
                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption sfl tp-resizeme" 
                                     data-x="left" data-hoffset="550" 
                                     data-y="center" data-voffset="-80" 
                                     data-speed="800" 
                                     data-start="800" 
                                     data-easing="Power3.easeInOut" 
                                     data-splitin="chars" 
                                     data-splitout="none" 
                                     data-elementdelay="0.03" 
                                     data-endelementdelay="0.4" 
                                     data-endspeed="300"
                                     style="z-index: 5; font-size:26px; font-weight:500; color:#888888;  max-width: auto; max-height: auto; white-space: nowrap;">{{ $slider->title}} </div>
                    
                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption sfr tp-resizeme" 
                                     data-x="left" data-hoffset="550" 
                                     data-y="center" data-voffset="-40" 
                                     data-speed="800" 
                                     data-start="1000" 
                                     data-easing="Power3.easeInOut" 
                                     data-splitin="chars" 
                                     data-splitout="none" 
                                     data-elementdelay="0.03" 
                                     data-endelementdelay="0.1" 
                                     data-endspeed="300" 
                                     style="z-index: 6; font-size:36px; color:#22c961; font-weight:800; white-space: nowrap;">{{ $slider->name}}</div>
                    
                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption sfr tp-resizeme" 
                                     data-x="left" data-hoffset="550" 
                                     data-y="center" data-voffset="10" 
                                     data-speed="800" 
                                     data-start="1300" 
                                     data-easing="Power3.easeInOut" 
                                     data-splitin="chars" 
                                     data-splitout="none" 
                                     data-elementdelay="0.03" 
                                     data-endelementdelay="0.4" 
                                     data-endspeed="300"
                                     style="z-index: 5; font-size:36px; font-weight:800; color:#000;  max-width: auto; max-height: auto; white-space: nowrap;"> </div>
                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption sfl tp-resizeme" 
                                     data-x="left" data-hoffset="50" 
                                     data-y="center" data-voffset="0" 
                                     data-speed="800" 
                                     data-start="1300"
                                     data-easing="Power3.easeInOut" 
                                     data-elementdelay="0.1" 
                                     data-endelementdelay="0.1" 
                                     data-endspeed="300" 
                                     data-scrolloffset="0"
                                     style="z-index: 1;"><img src="{{ asset('hamropasal/slider/'.$slider->image) }}" alt="" > </div>
                    
                    <!-- LAYER NR. 4 -->
                    <div class="tp-caption lfb tp-resizeme" 
                                     data-x="left" data-hoffset="550" 
                                     data-y="center" data-voffset="100"
                                     data-speed="800" 
                                     data-start="1300"
                                     data-easing="Power3.easeInOut" 
                                     data-elementdelay="0.1" 
                                     data-endelementdelay="0.1" 
                                     data-endspeed="300" 
                                     data-scrolloffset="0"
                                     style="z-index: 8;">
                                     <a  class="btn-round big" href="
                                     @if($slider->subcategory_id) {{route('products.subcategory',['subcategory'=>$slider->subcategories->slug])}}
                                     @elseif($slider->category_id)
                                     {{route('products.category',['category'=>$slider->categories->slug])}}
                                     @else
                                     {{ $slider->url}}
                                    @endif

                                     ">Shop Now</a>
                                   </div>
                  </li>
                 @endforeach
                  
                 
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Content -->
  <div id="content"> 
    
    <!-- Banner -->
    <section class="disply-sec slid-sec margin-bottom-0">
      <div class="container">
        <div class="row"> 
         
         @foreach($banners as $banner)
         <a href="{{ route('products.category',['category'=>$banner->categories->slug])}}"> 
          <div class="col-md-4">
            <div class="product">
              <div class="like-bnr watch" style="background-image: url({{ asset('hamropasal/banner/'.$banner->image) }});">
                <div class="position-center-center">
                  <h5>{{ $banner->title}}</h5>
                  <h4>SmartPhone</h4>
                </div>
              </div>
            </div>
          </div>
        </a>
          @endforeach
        </div>
      </div>
    </section>
    
    <!-- HOT DEAL -->
    <section class="padding-top-60 padding-bottom-60">
      <div class="container">
        <div class="row"> 
          
          <!-- Popular items -->
          <div class="col-sm-3"> 
            
            <!-- heading -->
            <div class="heading">
              <h2>Popular items</h2>
              <hr>
            </div>
            <div class="shop-listing on-list"> 
              @foreach($populars as $popular)
              <!-- Items list -->
              <div class="media">
                <div class="media-left"> <a href="{{route('products.show',['product' =>$popular->slug])}}" class="avatar"><img class="img-responsive" src="{{ asset('hamropasal/product/'.$popular->image) }}" alt="" ></a> </div>
                <div class="media-body"> <a href="{{route('products.show',['product' =>$popular->slug])}}">{{$popular->product_name}}</a>
                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>                
                <span class="price"><b>{{ $popular->discount_price}}</b> <small>{{ $popular->original_price}}</small></span> </div>
              </div>
              @endforeach
              
              
              <a href="{{route('products.index')}}" class="view-all">+ View more</a>
              
              
            </div>
          </div>
          
          <!-- Weekly DEAL -->
          <div class="col-sm-9"> 
            
            <!-- heading -->
            <div class="heading">
              <h2>Hot Deal Of the Week</h2>
              <hr>
            </div>
            <!-- Weekly Deal Slide -->
            <div class="singl-slide with-nav">
            <!-- Weekly Deal Slide -->
            @foreach($hotdeals as $hotdeal)
            <div class="weekly-deal">
              <div class="media-left">
                <div class="item-img"> <img class="img-responsive" src="{{ asset('hamropasal/product/'.$hotdeal->image) }}" alt=""> </div>
                <div class="offer-time">
                  <div class="countdown"> 
                    <!-- Days -->
                    <article> <span class="days">{{Carbon\Carbon::parse($hotdeal->expire_date)->diffInDays()}}</span>
                      <p class="days_ref">Days</p>
                    </article>
                    <!-- Hours -->
                    <article> <span class="hours">{{Carbon\Carbon::parse($hotdeal->expire_date)->diffInHours()}}</span>
                      <p class="hours_ref">Hours</p>
                    </article>
                    <!-- Mintes -->
                    <article><span class="minutes">{{Carbon\Carbon::parse($hotdeal->expire_date)->diffInMinutes()}}</span>
                      <p class="minutes_ref">Minutes</p>
                    </article>
                    <!-- Seconds -->
                    <article><span class="seconds">{{Carbon\Carbon::parse($hotdeal->expire_date)->DiffInSeconds()}}</span>
                      <p class="seconds_ref">Seconds</p>
                    </article>
                  </div>
                </div>
              </div>
              <div class="media-body"> <span class="tags">
              @if($hotdeal->subcategories)
              {{ $hotdeal->subcategories->name}}
              @else
              {{ $hotdeal->categories->name}}
              @endif
            </span> <a href="#." class="tittle">{{ $hotdeal->product_name}}</a>
                <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                <div class="row">
                  <div class="col-sm-6"><span class="price">Rs {{ $hotdeal->discount_price}} <small>Rs{{ $hotdeal->original_price}}</small></span></div>
                  <div class="col-sm-6 margin-top-10">
                    <p>Availability: <span class="in-stock">
                    @if($hotdeal->quantity >=0)
                    In Stock
                    @else
                    Out Stock
                    @endif
                  </span></p>
                  </div>
                </div>
                <ul>
                  <li>{{ $hotdeal->detail}}</li>
                </ul>
                 <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                   <input type="hidden" value="{{ $hotdeal->id }}" id="id" name="id">
                    <input type="hidden" value="{{ $hotdeal->product_name }}" id="name" name="name">
                    <input type="hidden" value="{{ $hotdeal->discount_price }}" id="price" name="price">
                    <input type="hidden" value="{{ $hotdeal->image }}" id="image" name="image">
                    <input type="hidden" value="{{ $hotdeal->slug }}" id="slug" name="slug">
                    <input type="hidden" value="1" id="quantity" name="quantity">
                    <button class="btn-round">
                    <i class="icon-basket-loaded">
                      Add to Cart
                    </i>
                    </button>
                </form>
              </div>
            </div>
            @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- tab Section -->
    <section class="featur-tabs padding-top-20 padding-bottom-60">
      <div class="container"> 
        
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-bars margin-bottom-40" role="tablist">
          <li role="presentation" class="active"><a href="#featur" aria-controls="featur" role="tab" data-toggle="tab">Featured</a></li>
          <li role="presentation"><a href="#special" aria-controls="special" role="tab" data-toggle="tab">Special</a></li>
          <li role="presentation"><a href="#on-sal" aria-controls="on-sal" role="tab" data-toggle="tab">Onsale</a></li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content"> 
          <!-- Featured -->
          <div role="tabpanel" class="tab-pane active fade in" id="featur"> 
            <!-- Items Slider -->
            <div class="item-slide-4 with-nav"> 
              <!-- Product -->
              @foreach($featuredProduct as $product)
              <div class="product">
                <article> <img class="img-responsive" src="{{ asset('hamropasal/product/'.$product->image) }}" alt="" > 
                  <!-- Content --> 
                  @if($product->subcategories)
                  <span class="tag">{{ $product->subcategories->name}}</span>
                  @else
                   <span class="tag">{{ $product->categories->name}}</span>
                  @endif

                   <a href="{{route('products.show',['product' =>$product->slug])}}" class="tittle">{{ $product->product_name}}</a> 
                  <!-- Reviews -->
                  <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                  <div class="price">Rs {{ $product->discount_price}} </div>
                   <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                   <input type="hidden" value="{{ $product->id }}" id="id" name="id">
                    <input type="hidden" value="{{ $product->product_name }}" id="name" name="name">
                    <input type="hidden" value="{{ $product->discount_price }}" id="price" name="price">
                    <input type="hidden" value="{{ $product->image }}" id="image" name="image">
                    <input type="hidden" value="{{ $product->slug }}" id="slug" name="slug">
                    <input type="hidden" value="1" id="quantity" name="quantity">
                    <button class="cart-btn">
                    <i class="icon-basket-loaded">
                    </i>
                    </button>
                </form>
                </article>
              </div>
             @endforeach
              
            </div>
          </div>
          
          <!-- Special -->
          <div role="tabpanel" class="tab-pane fade" id="special"> 
            <!-- Items Slider -->
            <div class="item-col-4"> 
              @foreach($special as $product)
              <!-- Product -->
               <div class="product">
                <article> <img class="img-responsive" src="{{ asset('hamropasal/product/'.$product->image) }}" alt="" >
                  
                  <!-- Content --> 
                  <span class="tag">

                    @if($product->subcategories) 
                    {{ $product->subcategories->name }} 
                    @else
                     {{ $product->categories->name }}
                    @endif
                    
                  </span> <a href="{{route('products.show',['product' =>$product->slug])}}" class="tittle">{{ $product->product_name}}</a> 
                  <!-- Reviews -->
                  <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i> <span class="margin-left-10">5 Review(s)</span></p>
                  <div class="price"> Rs {{ $product->discount_price}}<span>Rs{{ $product->original_price}}</span></div>
                   <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                   <input type="hidden" value="{{ $product->id }}" id="id" name="id">
                    <input type="hidden" value="{{ $product->product_name }}" id="name" name="name">
                    <input type="hidden" value="{{ $product->discount_price }}" id="price" name="price">
                    <input type="hidden" value="{{ $product->image }}" id="image" name="image">
                    <input type="hidden" value="{{ $product->slug }}" id="slug" name="slug">
                    <input type="hidden" value="1" id="quantity" name="quantity">
                    <button class="cart-btn">
                    <i class="icon-basket-loaded">
                    </i>
                    </button>
                </form>
                   </article>
              </div>
              @endforeach
              
              
              
            </div>
          </div>
          
          <!-- on sale -->
          <div role="tabpanel" class="tab-pane fade" id="on-sal"> 
            <!-- Items Slider -->
            <div class="item-col-4"> 
              @foreach($onsale as $onsale)
              <!-- Product -->
              <div class="product">
                <article> <img class="img-responsive" src="{{ asset('hamropasal/product/'.$onsale->image) }}" alt="" >
                  
                  <!-- Content --> 
                  <span class="tag">

                    @if($onsale->subcategories) 
                    {{ $onsale->subcategories->name }} 
                    @else
                     {{ $onsale->categories->name }}
                    @endif
                    
                  </span> <a href="{{route('products.show',['product' =>$onsale->slug])}}" class="tittle">{{ $onsale->product_name}}</a> 
                  <!-- Reviews -->
                  <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i> <span class="margin-left-10">5 Review(s)</span></p>
                  <div class="price"> Rs {{ $onsale->discount_price}}<span>Rs{{ $onsale->original_price}}</span></div>
                   <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                   <input type="hidden" value="{{ $onsale->id }}" id="id" name="id">
                    <input type="hidden" value="{{ $onsale->product_name }}" id="name" name="name">
                    <input type="hidden" value="{{ $onsale->discount_price }}" id="price" name="price">
                    <input type="hidden" value="{{ $onsale->image }}" id="image" name="image">
                    <input type="hidden" value="{{ $onsale->slug }}" id="slug" name="slug">
                    <input type="hidden" value="1" id="quantity" name="quantity">
                    <button class="cart-btn">
                    <i class="icon-basket-loaded">
                    </i>
                    </button>
                </form>
                   </article>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Featured Categories -->
    <section class="light-gry-bg padding-top-60 padding-bottom-30">
      <div class="container"> 
        
        <!-- heading -->
        <div class="heading">
          <h2>Featured Categories</h2>
          <hr>
        </div>
        <div class="row"> 
          @foreach($featurecategories as $category)
          <!-- TV & Audios -->
          @if($category->subcategories->count() >= 4)
          <div class="col-md-4">
            <div class="some-cate"> <img src="{{ asset('hamropasal/category/'.$category->image) }}" alt="" >
              <h5>{{ $category->name}}</h5>
              <ul>
                @foreach($category->subcategories->take(4) as $subcategory)
                <li><a href="{{route('products.subcategory',['subcategory'=>$subcategory->slug])}}"> {{ $subcategory->name}}</a></li>
                @endforeach
                <li><a href="{{route('products.category',['category'=>$category->slug])}}"> View all <i class="fa fa-angle-double-right"></i></a></li>
              
              </ul>
            </div>
          </div>
          @endif
          @endforeach

          </div>
        </div>
      </div>
    </section>
    
    <!-- Top Selling Week -->
    <section class="padding-bottom-60 padding-top-60">
      <div class="container"> 
        
        <!-- heading -->
        <div class="heading">
          <h2>Top Selling of the Week</h2>
          <hr>
        </div>
        <div class="row">
          <div class="col-md-6"> 
            
            <!-- Items -->
            <div class="item-col-2"> 
              @foreach($topselling as $selling)
               @if ($loop->first) @continue @endif
               
              <!-- Product -->
              <div class="product">
                <article> <img class="img-responsive" src="{{asset('hamropasal/product/'.$selling->products->image) }}" alt="" >
                  
                  <!-- Content --> 
                  <span class="tag">
                     @if($selling->products->subcategories) 
                    {{ $selling->products->subcategories->name }} 
                    @else
                     {{ $selling->products->categories->name }}
                    @endif
                    
                  </span> <a href="{{route('products.show',['product' =>$selling->products->slug])}}" class="tittle">{{ $selling->products->product_name}}</a> 
                  <!-- Reviews -->
                  <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i> <span class="margin-left-10">5 Review(s)</span></p>
                  <div class="price">Rs {{$selling->products->discount_price}}<span>Rs{{$selling->products->original_price}} </span></div>
                   <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                   <input type="hidden" value="{{ $selling->products->id }}" id="id" name="id">
                    <input type="hidden" value="{{ $selling->products->product_name }}" id="name" name="name">
                    <input type="hidden" value="{{ $selling->products->discount_price }}" id="price" name="price">
                    <input type="hidden" value="{{ $selling->products->image }}" id="image" name="image">
                    <input type="hidden" value="{{ $selling->products->slug }}" id="slug" name="slug">
                    <input type="hidden" value="1" id="quantity" name="quantity">
                    <button class="cart-btn">
                    <i class="icon-basket-loaded">
                    </i>
                    </button>
                </form>
              </article>
              </div>
              @endforeach
              
            </div>
          </div>
          
          <!-- Big Product -->
          <div class="col-md-6">
            <div class="product">
              <article> 
                <!-- Slider Thumb -->
                <div class="thumb-slider">
                  <ul class="slides">
                    @foreach($topselling as $selling)
                    @if($loop->first) @continue @endif
                    <li data-thumb="{{asset('hamropasal/product/'.$selling->products->image) }}"> <img src="{{asset('hamropasal/product/'.$selling->products->image) }}" alt="" > </li>
                    @endforeach
                  </ul>
                </div>
               @if($selling->first()) 
             
                <!-- Content --> 
                <span class="tag">
                    @if($selling->products->subcategories) 
                    {{ $selling->products->subcategories->name }} 
                    @else
                     {{ $selling->products->categories->name }}
                    @endif
                </span>
                 <a href="{{route('products.show',['product' =>$selling->products->slug])}}" class="tittle">{{ $selling->products->product_name}}</a> 
                <!-- Reviews -->
                <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                <div class="price">Rs{{ $selling->products->discount_price}}</div>
                  <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                   <input type="hidden" value="{{ $selling->products->id }}" id="id" name="id">
                    <input type="hidden" value="{{ $selling->products->product_name }}" id="name" name="name">
                    <input type="hidden" value="{{ $selling->products->discount_price }}" id="price" name="price">
                    <input type="hidden" value="{{ $selling->products->image }}" id="image" name="image">
                    <input type="hidden" value="{{ $selling->products->slug }}" id="slug" name="slug">
                    <input type="hidden" value="1" id="quantity" name="quantity">
                    <button class="cart-btn">
                    <i class="icon-basket-loaded">
                    </i>
                    </button>
                </form>
             @endif
              </article>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Clients img -->
    <section class="light-gry-bg clients-img">
      <div class="container">
        <img src="frontend/banner/banner.jpg" alt="" >
      </div>
    </section>
    
    <!-- Blog -->
    <section class="padding-bottom-60 padding-top-60">
      <div class="container"> 
        
        <!-- heading -->
        <div class="heading">
          <h2>From our Blog</h2>
          <hr>
        </div>
        <div id="blog-slide" class="with-nav"> 
          @foreach($blogs as $blog)
          <!-- Blog Post -->
          <div class="blog-post">
            <article> <img class="img-responsive" src="{{ asset('hamropasal/blog/'.$blog->image) }}" alt="" > <span><i class="fa fa-bookmark-o"></i> {{ $blog->created_at->format('m-M-Y')}}</span> <span><i class="fa fa-comment-o"></i> {{$blog->blogcomments->count()}} Comments</span> <a href="{{route('blog.show',$blog->slug)}}" class="tittle">{{ $blog->title}}</a>
              <p>{{ \Illuminate\Support\Str::limit($blog->description, 100, '[...]') }} </p>
              <a href="{{route('blog.show',['slug'=>$blog->slug])}}">Readmore</a> </article>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    
    <!-- Shipping Info -->
    <section class="shipping-info">
      <div class="container">
        <ul>
          
          <!-- Free Shipping -->
          <li>
            <div class="media-left"> <i class="flaticon-delivery-truck-1"></i> </div>
            <div class="media-body">
              <h5>Free Shipping</h5>
              <span>On order over $99</span></div>
          </li>
          <!-- Money Return -->
          <li>
            <div class="media-left"> <i class="flaticon-arrows"></i> </div>
            <div class="media-body">
              <h5>Money Return</h5>
              <span>30 Days money return</span></div>
          </li>
          <!-- Support 24/7 -->
          <li>
            <div class="media-left"> <i class="flaticon-operator"></i> </div>
            <div class="media-body">
              <h5>Support 24/7</h5>
              <span>Hotline: (+100) 123 456 7890</span></div>
          </li>
          <!-- Safe Payment -->
          <li>
            <div class="media-left"> <i class="flaticon-business"></i> </div>
            <div class="media-body">
              <h5>Safe Payment</h5>
              <span>Protect online payment</span></div>
          </li>
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