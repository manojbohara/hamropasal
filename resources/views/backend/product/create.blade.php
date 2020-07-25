@extends('backend.admin.layouts.app')
@section('title','HamroPasal | Product | CREATE')
@section('content')
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>HamroPasal Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">HamroPasal Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 <div class="container-fluid">
@if (count($errors) > 0)

  <div class="alert alert-danger">

    <strong>Whoops!</strong> There were some problems with your input.<br><br>

    <ul>

       @foreach ($errors->all() as $error)

         <li>{{ $error }}</li>

       @endforeach

    </ul>

  </div>

@endif
 <div class="card">
          <div class="card-header">
            <h3 class="card-title">New HamroPasal Products</h3>
          </div>
          <!-- /.card-header -->

{!! Form::open(array('route' => 'products.store','method'=>'POST','enctype' => 'multipart/form-data')) !!}
          <div class="card-body">
           <div class="row">
         <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Category Name:</strong>
            {!! Form::select('category_id',$categories,null,['class' => 'form-control','placeholder'=>'select category']) !!}
        </div>
      </div>
         <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Subcategory Name:</strong>
            {!! Form::select('subcategory_id',$subcategories,null,['class' => 'form-control','placeholder'=>'please select']) !!}
        </div>
      </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Product Name:</strong>
            {!! Form::text('product_name', null, array('placeholder' => ' Product Name','class' => 'form-control')) !!}
        </div>
    </div>
     <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Quantity:</strong>
            {!! Form::number('quantity', null, array('placeholder' => 'Enter Product Quantity','class' => 'form-control')) !!}
        </div>
    </div>
     <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Original Price:</strong>
            {!! Form::text('original_price', null, array('placeholder' => 'Enter Product Original Price','class' => 'form-control')) !!}
        </div>
    </div>
     <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Discount Price:</strong>
            {!! Form::text('discount_price', null, array('placeholder' => 'Enter Product Discount Price','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Image:</strong>
            {!! Form::file('image', array('class' => 'form-control')) !!}
        </div>
    </div>
     <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Detail:</strong>
            {!! Form::textarea('detail', null, array('placeholder' => 'Enter Product Detail','class' => 'form-control','rows' => 4, 'cols' => 54)) !!}
        </div>
    </div>
     <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Description:</strong>
            {!! Form::textarea('description', null, array('placeholder' => 'Enter Product Description','class' => 'form-control','rows' => 4, 'cols' => 54)) !!}
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
    {!! Form::select('size_id',$sizes,null,array('multiple'=>'multiple','name'=>'size_id[]','class' => 'form-control'))!!}
    <p>
      More custom size 
      <a href="{{route('sizes.create')}}" class="btn btn-primary btn-sm mt-2">Add</a>
    </p>
    </div>
     <div class="col-xs-6 col-sm-6 col-md-6">
    {!! Form::select('color_id',$colors,null,array('multiple'=>'multiple','name'=>'color_id[]','class' => 'form-control'))!!}
    <p>
      More custom Colors 
      <a href="{{route('colors.create')}}" class="btn btn-primary btn-sm mt-2">Add</a>
    </p>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Hot Deal:</strong>
              {{Form::hidden('hotdeal',0)}}
          {{Form::checkbox('hotdeal',1)}}
        </div>
    </div>
      <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Special:</strong>
              {{Form::hidden('special',0)}}
          {{Form::checkbox('special',1)}}
        </div>
    </div>
      <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>On Sale:</strong>
              {{Form::hidden('onsale',0)}}
          {{Form::checkbox('onsale',1)}}
        </div>
    </div>
     <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Expire Date:</strong>
            {!! Form::date('expire_date', \Carbon\Carbon::now()) !!}
        </div>
    </div>
      <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Meta Title:</strong>
            {!! Form::text('meta_title', null, array('placeholder' => 'Enter Meta Title','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Meta Keyword:</strong>
            {!! Form::text('meta_keyword', null, array('placeholder' => 'Enter Meta Keyword','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Meta Description:</strong>
            {!! Form::text('meta_description', null, array('placeholder' => 'Enter Meta Description','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Status:</strong>
            {!! Form::select('status', ['0' => 'Active', '1' => 'InActive'], null, ['placeholder' => 'Pick a Status...','class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </div>
    {!! Form::close() !!}
    </div>   
    </div>
    <br>
</div>
@endsection