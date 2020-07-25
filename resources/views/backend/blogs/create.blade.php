@extends('backend.admin.layouts.app')
@section('title','HamroPasal | Blog | Create')
@section('content')
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blog</h1>
          </div>
          <div class="col-md-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active"> Blog</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
   @endif
    @include('sweetalert::alert')
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-md-12">
    			<div class="card">
    				<div class="card-header">
    					<h6>Blog Create</h6>
    				</div>
    			{!! Form::open(array('route' => 'blogs.store','method'=>'POST','enctype' => 'multipart/form-data')) !!}
    				<div class="card-body">
					    <div class="col-xs-12 col-sm-12 col-md-12">
					        <div class="form-group">
					            <strong>Blog Title:</strong>
					            {!! Form::text('title', null, array('placeholder' => 'Enter Blog Title','class' => 'form-control')) !!}
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
					           {!! Form::textarea('description', null, array('placeholder' => 'Enter Short Description about Blog','class' => 'form-control','cols' => 4, 'rows' =>4,)) !!}
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