@extends('backend.admin.layouts.app')
@section('title','HamroPasal | Products')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @include('sweetalert::alert')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">HamroPasal products</h3>
              <a class="btn btn-success btn-sm float-sm-right" href="{{ route('products.create') }}"> Create New Product</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="products" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Category Name</th>
                  <th>Subcategory Name</th>
                  <th>Product Name</th>
                  <th>Slug</th>
                  <th>Original Price</th>
                  <th>Image</th>
                  <th>Quantity</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $key => $product)
                <tr>
                  <td>{{ $product->categories->name }}</td>
                  @if($product->subcategories)
                  <td>{{ $product->subcategories->name }}</td>
                  @else
                  <td>Null</td>
                    @endif
                  <td>{{ $product->product_name }}</td>
                  <td>{{ $product->slug }}</td>
                  <td>{{ $product->original_price }}</td>
                  <td><img src="{{ asset('hamropasal/product/'.$product->image) }}" class="img img-responsive img-sm" alt="hamropasal Image" /></td>
                  <td>{{ $product->quantity }}</td>
                  <td> 
                 <a class="btn btn-warning btn-sm" href="{{ url('hamropasal/products',$product->id) }}">Show</a>   
                <a class="btn btn-primary btn-sm" href="{{ route('products.edit',$product->id) }}">Edit</a>
                {!! Form::open(['method' => 'DELETE','route' => ['products.destroy', $product->id],'style'=>'display:inline']) !!}

                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}

                {!! Form::close() !!}
                  </td>
                </tr>
              @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Category Name</th>
                  <th>Subcategory Name</th>
                  <th>Product Name</th>
                  <th>Slug</th>
                  <th>Selling Price</th>
                  <th>Image</th>
                  <th>Quantity</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('hamropasal/backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<!-- page script -->
<script>
  $(function () {
    $("#products").DataTable();
  });
</script>
@endsection
