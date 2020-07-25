@extends('backend.admin.layouts.app')
@section('title','HamroPasal | Categories | Create')
@section('content')
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category</h1>
          </div>
          <div class="col-md-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active"> Category</li>
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
    					<h6>Category Create</h6>
    				</div>
    			{!! Form::open(array('route' => 'categories.store','method'=>'POST','enctype' => 'multipart/form-data')) !!}
    				<div class="card-body">
					    <div class="col-xs-12 col-sm-12 col-md-12">
					        <div class="form-group">
					            <strong>Category Name:</strong>
					            {!! Form::text('name', null, array('placeholder' => 'Enter Category Name','class' => 'form-control')) !!}
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
					            <strong>Description :</strong>
					           {!! Form::textarea('description', null, array('placeholder' => 'Enter Short Description about Brand','class' => 'form-control','cols' => 4, 'rows' =>4,)) !!}
					        </div>
					    </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Featured:</strong>
                      {{Form::hidden('is_featured',1)}}
                  {{Form::checkbox('is_featured',0)}}
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

@endsection