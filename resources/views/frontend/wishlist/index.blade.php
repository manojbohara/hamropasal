@extends('frontend.layouts.app')
@section('title','HamroPasal | WishList')
@section('content')
  <!-- Linking -->
  <div class="linking">
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="{{url('/')}}">Home</a></li>
        <li class="active">WishList</li>
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
              <h6>Categories</h6>
              <div class="checkbox checkbox-primary">
                <ul>
                  <li>
                    <input id="cate1" class="styled" type="checkbox" >
                    <label for="cate1"> Home Audio & Theater </label>
                  </li>
                  <li>
                    <input id="cate2" class="styled" type="checkbox" >
                    <label for="cate2"> TV & Video</label>
                  </li>
                  <li>
                    <input id="cate3" class="styled" type="checkbox" >
                    <label for="cate3"> Camera, Photo & Video</label>
                  </li>
                  <li>
                    <input id="cate4" class="styled" type="checkbox" >
                    <label for="cate4"> Cell Phones & Accessories</label>
                  </li>
                  <li>
                    <input id="cate5" class="styled" type="checkbox" >
                    <label for="cate5"> Headphones</label>
                  </li>
                  <li>
                    <input id="cate6" class="styled" type="checkbox" >
                    <label for="cate6"> Video Games</label>
                  </li>
                  <li>
                    <input id="cate7" class="styled" type="checkbox" >
                    <label for="cate7"> Bluetooth & Wireless Speakers</label>
                  </li>
                  <li>
                    <input id="cate8" class="styled" type="checkbox" >
                    <label for="cate8"> Gaming Console</label>
                  </li>
                  <li>
                    <input id="cate9" class="styled" type="checkbox" >
                    <label for="cate9"> Computers & Tablets</label>
                  </li>
                  <li>
                    <input id="cate10" class="styled" type="checkbox" >
                    <label for="cate10"> Monitors</label>
                  </li>
                  <li>
                    <input id="cate11" class="styled" type="checkbox" >
                    <label for="cate11"> Home Appliances</label>
                  </li>
                  <li>
                    <input id="cate12" class="styled" type="checkbox" >
                    <label for="cate12">Office Supplies </label>
                  </li>
                </ul>
              </div>
              
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
                  <li>
                    <input id="brand10" class="styled" type="checkbox" >
                    <label for="brand10"> HTC <span>(59)</span> </label>
                  </li>
                  <li>
                    <input id="brand11" class="styled" type="checkbox" >
                    <label for="brand11"> Lenovo <span>(68)</span> </label>
                  </li>
                  <li>
                    <input id="brand12" class="styled" type="checkbox" >
                    <label for="brand12">Sanyo  (19) </label>
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
            
            <!-- Short List -->
            <div class="short-lst">
              <h2>Wishlist</h2>
              <ul>
                <!-- Short List -->
                <li>
                  <p>Showing 1–12 of 756 results</p>
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
                  <select class="selectpicker">
                    <option>Sort by Default </option>
                    <option>Sort by Default </option>
                    <option>Sort by Default</option>
                  </select>
                </li>
                
                <!-- Grid Layer -->
                <li class="grid-layer"> <a href="#."><i class="fa fa-list margin-right-10"></i></a> <a href="#."><i class="fa fa-th"></i></a> </li>
              </ul>
            </div>
            
            <!-- Items -->
            <div class="col-list">  
			@if (Auth::user()->wishlist->count() )
			@forelse ($wishlists as $wishlist)
              <!-- Product -->
              <div class="product">
                <article>                   
                  <!-- Product img -->
                  <div class="media-left">
                    <div class="item-img"> <img class="img-responsive" src="{{ asset('hamropasal/product/'.$wishlist->product->image) }}" alt="" >  </div>
                  </div>                  
                  <!-- Content -->
                  <div class="media-body">
                    <div class="row">                       
                      <!-- Content Left -->
                      <div class="col-sm-7"> <span class="tag">
                      	 @if($wishlist->product->subcategories)
	                    {{ $wishlist->product->subcategories->name}}
	                    @else
	                    {{$wishlist->product->categories->name}}
	                    @endif
                      </span> <a href="{{route('products.show',['product' =>$wishlist->product->slug])}}" class="tittle">{{$wishlist->product->product_name}}</a> 
                        <!-- Reviews -->
                        <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i> <span class="margin-left-10">5 Review(s)</span></p>
                        <ul class="bullet-round-list">
                          <li>{{$wishlist->product->description}}</li>
                        </ul>
                      </div>                      
                      <!-- Content Right -->
                      <div class="col-sm-5 text-center"> 
                       <form method="POST" action="{{route('wishlist.destroy',$wishlist->id)}}">
                       	@csrf
                       	@method('delete')
                       	<button class=" a heart"><i class="fa fa-trash" aria-hidden="true"></i></button>
                       </form>
                        <div class="position-center-center">
                          <div class="price">Rs {{ $wishlist->product->discount_price}} </div>
                          <p>Availability: <span class="in-stock">
                          	@if($wishlist->product->quantity > 0) 
                        	In Stock
                        	@else
                        	Out of Stock			
                        	@endif
                          </span></p>
                          @if($wishlist->product->quantity > 0) 
		                  <form action="{{ route('cart.store') }}" method="POST">
		                    @csrf
		                   <input type="hidden" value="{{ $wishlist->product->id }}" id="id" name="id">
		                    <input type="hidden" value="{{ $wishlist->product->product_name }}" id="name" name="name">
		                    <input type="hidden" value="{{ $wishlist->product->discount_price }}" id="price" name="price">
		                    <input type="hidden" value="{{ $wishlist->product->image }}" id="image" name="image">
		                    <input type="hidden" value="{{ $wishlist->product->slug }}" id="slug" name="slug">
		                    <input type="hidden" value="1" id="quantity" name="quantity">
		                    <button class=" a btn-round">
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
                  </div>
                </article>
                
            @empty
            <p>No Product In Wish List</p>	
              </div>   
            <!-- Product -->              
			 @endforelse
			 @endif
              <!-- pagination -->
              <ul class="pagination">
               {{$wishlists->links()}}
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
  <!-- End Content --> 
@endsection