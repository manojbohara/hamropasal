@extends('frontend.layouts.app')

@section('content')
  <!-- Linking -->
  <div class="linking">
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">{{ request()->input('query')}}</li>
      </ol>
    </div>
  </div>
  
  <!-- Content -->
  <div id="content"> 
    
    <!-- Products -->
    <section class="padding-top-40 padding-bottom-60">
      <div class="container">
        <div class="row">   
          <!-- Products -->
          <div class="col-md-12"> 
            
            <!-- Short List -->
            <div class="short-lst">
              <h2>{{ request()->input('query')}}</h2>
              <ul>
                <!-- Short List -->
                <li>
                  <p>{{$products->count()}} of {{$products->count()}} results</p>
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
                    <option>Low to High </option>
                    <option>High to Low </option>
                  </select>
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
              @forelse($products as $product)
              <div class="product">
                <article> <img class="img-responsive" src="{{ asset('hamropasal/product/'.$product->image) }}" alt="" > 
                  <!-- Content --> 
                  <span class="tag">
                  @if($product->subcategories)	
                  {{ $product->subcategories->name}}
                  @else
                  {{ $product->categories->name }}
                  @endif
                  </span> <a href="{{ route('products.show',$product->slug)}}" class="tittle">{{ $product->product_name}}</a> 
                  <!-- Reviews -->
                  <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i> <span class="margin-left-10">5 Review(s)</span></p>
                  <div class="price">Rs{{ $product->discount_price}} <span>Rs {{ $product->original_price}}</span></div>
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
              <p>No Product Found</p>
              @endforelse
              
              <!-- pagination -->
              <ul class="pagination">
               {{ $products->links()}}
              </ul>
            </div>
          </div>
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
@endsection