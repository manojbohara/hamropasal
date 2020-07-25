<?php
  use Darryldecode\Cart\Cart;
  use App\Model\Category;
  use App\Model\Subcategory;
  use App\Model\Contact;
  $categories = Category::all();
  $subcategories = Subcategory::all();
 $cartCollection = \Cart::getContent();
 $featuredcategories = Category::where('is_featured', 1)->take(7)->latest()->get();
 $contacts = Contact::first();


?>
  <header class="header-style-5">
    <div class="container">
      <div class="logo">
        <a href="{{url('/')}}"><h3 style="margin: 0;"><span style="color: #22c961">Royal </span><span style="font-size: 28px; color: #222222;">OnlineStore</span></h3></a>
    </div>
      <div class="go-right"> <span class="call-mun"><i class="fa fa-phone"></i> <strong>Hotline:</strong><br>
        {{ $contacts->phone}}</span> 
        
        <!-- search -->
        <div class="search-cate">
          <form method="get" action="{{ route('products.search')}}">
          <select class="selectpicker">
            <option> All Categories</option>
            @foreach($categories as $category)
            <option>{{ $category->name}}</option>
            @endforeach
          </select>
          <input type="text"  name= "query" id = "query" placeholder="Search entire store here..." value="{{ request()->input('query')}}">
          <button class="submit" type="submit"><i class="icon-magnifier"></i></button>
        </form>
        </div>
        
        <!-- Cart Part -->
        <ul class="nav navbar-right cart-pop">
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="itm-cont">{{ \Cart::getTotalQuantity()}}</span> <i class="flaticon-shopping-bag"></i> <strong>My Cart</strong> <br>
            <span>
            @if(\Cart::getTotalQuantity()>0)
            {{ \Cart::getTotalQuantity()}} item(s) -Rs{{ \Cart::getTotal() }}
            @endif
          </span></a>
            <ul class="dropdown-menu">
              @if(\Cart::getTotalQuantity()>0)
              @foreach($cartCollection as $item)
              <li>
                <div class="media-left"> <a href="#." class="thumb"> <img src="/hamropasal/product/{{ $item->attributes->image }}" class="img-responsive" alt="" > </a> </div>
                <div class="media-body"> <a href="#." class="tittle">{{$item->name}}</a> <span>{{$item->price}} x {{$item->quantity}}</span> </div>
              </li>
              @endforeach
              <li class="btn-cart"> <a href="{{route('cart.index')}}" class="btn-round">View Cart</a> </li>
              @else
              <h6>No Items in Cart </h6>
              @endif
            </ul>
          </li>
        </ul>
      </div>
    </div>
    
    <!-- Nav -->
    <nav class="navbar ownmenu">
      <div class="container"> 
        
        <!-- Categories -->
        <div class="cate-lst"> <a  data-toggle="collapse" class="cate-style" href="#cater"><i class="fa fa-list-ul"></i> Our Categories </a>
          <div class="cate-bar-in">
            <div id="cater" class="collapse">
              <ul>
                @foreach($categories as $category)
                  <li class="sub-menu"><a href="{{route('products.category',['category'=>$category->slug])}}">{{ $category->name}}</a>
                 @if($category->subcategories->count())
                    <ul>
                      @foreach($category->subcategories as $subcategory)
                      <li><a href="{{route('products.subcategory',['subcategory'=>$subcategory->slug])}}">
                        {{ $subcategory->name}}
                      </a></li>
                      @endforeach
                    </ul>
                    @endif
                    @endforeach
                </ul>
            </div>
          </div>
        </div>
        
        <!-- Responsive Btn -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-open-btn" aria-expanded="false"> <span><i class="fa fa-navicon"></i></span> </button>
        </div>
        
        <!-- NAV -->
        <div class="collapse navbar-collapse" id="nav-open-btn">
          <ul class="nav">
            @foreach($featuredcategories as $category)
            <li><a href="{{route('products.category',['category'=>$category->slug])}}">{{ $category->name}}</a></li>
            @endforeach
            <!-- <li><a href="#">Laptop Bags</a></li> -->
          </ul>
        </div>
        
        <!-- NAV RIGHT -->
        <div class="nav-right"> </div>
      </div>
    </nav>
  </header>