@extends('backend.admin.layouts.app')
@section('title','HamroPasal | SLider | Update')
@section('content')
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Slider</h1>
          </div>
          <div class="col-md-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active"> Slider</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @include('sweetalert::alert')
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h6>Slider Update</h6>
            </div>
           {!! Form::model($slider, ['method' => 'PATCH','enctype' => 'multipart/form-data','route' => ['sliders.update', $slider->id]]) !!}

            <div class="card-body">
              <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                      <strong>Title:</strong>
                      {!! Form::text('title', null, array('placeholder' => 'Enter Slider title','class' => 'form-control')) !!}
                  </div>
              </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                      <strong>Name:</strong>
                      {!! Form::text('name', null, array('placeholder' => 'Enter Banner Name','class' => 'form-control')) !!}
                  </div>
              </div>
               <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                      <strong>Image:</strong>
                      {!! Form::file('image', array('class' => 'form-control')) !!}
                  </div>
              </div>
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
                      <strong>Banner redirct url:</strong>
                      {!! Form::text('url', null, array('placeholder' => ' slider Url','class' => 'form-control')) !!}
                  </div>
              </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                  <button type="submit" class="btn btn-primary">Submit</button>
             </div>
            </div>
          {!! Form::close() !!}
          </div>
        </div>
        </div>
      </div>
    </div>

@endsection