<?php
use App\Model\Product;
$products = session()->get('products.recently_viewed');
if ($products) {
  $recently_viewed =Product::find($products);
} else {
  $recently_viewed =Product::inRandomOrder()->take(5);
}

?>

<!-- Your Recently Viewed Items -->
    <section class="padding-bottom-60">
      <div class="container"> 
        
        <!-- heading -->
        <div class="heading">
          <h2>Your Recently Viewed Items</h2>
          <hr>
        </div>
        <!-- Items Slider -->
        <div class="item-slide-5 with-nav">

        @foreach($recently_viewed as $product) 
          <!-- Product -->
          <div class="product">
            <article> <img class="img-responsive" src="{{ asset('hamropasal/product/'.$product->image) }}" alt="" > 
              <!-- Content --> 
              <span class="tag">
                @if($product->subcategories)
                  {{ $product->subcategories->name}}
                @else
                  {{ $product->categories->name}}
                @endif
              </span> <a href="{{route('products.show',['product' =>$product->slug])}}" class="tittle">{{$product->product_name}}</a> 
              <!-- Reviews -->
              <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
              <div class="price">Rs {{ $product->discount_price}}</div>
              <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
          </div>
          @endforeach
          <!-- Product -->
        </div>
      </div>
    </section>