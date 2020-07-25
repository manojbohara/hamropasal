@extends('backend.admin.layouts.app')
@section('title','HamroPasal | Products | Show')
@section('content')
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Show</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Product Show</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h5>Product Show</h5>
      <a href="{{route('products.index')}}" class="btn btn-primary btn-sm float-sm-right"> Back</a>
    </div>
    <div class="card-body">
      <table id="dataIndexTable" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>Method</th>
                  <th>Property</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><strong> Category Name</strong></td>
                    <td>
                      {{ $product->categories->name }}
                    </td>
                  </tr>
                   <tr>
                    <td><strong> Subcategory Name</strong></td>
                    <td>
                      @if($product->subcategories)
                      {{ $product->subcategories->name }}
                      @else
                      Null
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <td><strong>Product Name</strong></td>
                    <td>
                      {{ $product->product_name }}
                    </td>
                  </tr>
                    <tr>
                    <td><strong>Product Slug</strong></td>
                    <td>
                      {{ $product->slug }}
                    </td>
                  </tr>
                  <tr>
                    <td><strong>Original Price</strong></td>
                    <td>
                      {{ $product->original_price }}
                    </td>
                  </tr>
                  <tr>
                    <td><strong>Discount Price</strong></td>
                    <td>
                      {{ $product->discount_price }}
                    </td>
                  </tr>
                  <tr>
                    <td><strong>Product Image</strong></td>
                    <td><img src="{{ asset('hamropasal/product/'.$product->image) }}" class="img img-responsive img-sm" alt="HamroPasal Image" /></td>
                  </tr>
                  <tr>
                    <td><strong>Product Quantity</strong></td>
                    <td>
                      {{ $product->quantity }}
                    </td>
                  </tr>
                  <tr>
                    <td><strong>Product Detail</strong></td>
                    <td>
                      {{ $product->detail }}
                    </td>
                  </tr>
                  <tr>
                    <td><strong>Product Description</strong></td>
                    <td>
                      {{ $product->description }}
                    </td>
                  </tr>
                   <tr>
                    <td><strong>Product Status</strong></td>
                    <td> 
                    @if($product->status == 0 ) Active 
                    @else Inactive
                    @endif
                    </td>
                  </tr>
                   <tr>
                    <td><strong>Available Size</strong></td>
                    <td>
                      @if($product->produtsize)
                     @foreach($product->produtsize as $size)
                      {{ $size->sizes->name }},
                     @endforeach
                     @endif
                    </td>
                  </tr>
                   <tr>
                    <td><strong>Available Color</strong></td>
                    <td>
                      @if($product->produtcolor)
                     @foreach($product->produtcolor as $color)
                    <span style="width:50px; display:inline-block;padding:5px;border:4px solid {{ $color->colors->value }};margin:5px 0px; display:inline-table">{{ $color->colors->color_name }}
                      </span>
                     @endforeach
                     @endif
                    </td>
                  </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Method</th>
                  <th>Property</th>
                </tr>
                </tfoot>
              </table>
    </div>
  </div>
</div>

@endsection