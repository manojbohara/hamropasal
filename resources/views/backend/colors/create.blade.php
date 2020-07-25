@extends('backend.admin.layouts.app')
@section('title','HamroPasal | Color | Create')
@section('content')
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Color</h1>
          </div>
          <div class="col-md-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active"> Colors</li>
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
    					<h6>Color Pick</h6>
    				</div>
    			{!! Form::open(array('route' => 'colors.store','method'=>'POST')) !!}
    				<div class="card-body">
					    <div class="col-xs-12 col-sm-12 col-md-12">
					        <div class="form-group">
					            <strong>Color Name:</strong>
					            {!! Form::text('color_name', null, array('placeholder' => 'Enter Size Name','class' => 'form-control')) !!}
					        </div>
					    </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Color Value:</strong>
                      {!! Form::color('value', null, array('placeholder' => 'Enter Size Name','class' => 'form-control')) !!}
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