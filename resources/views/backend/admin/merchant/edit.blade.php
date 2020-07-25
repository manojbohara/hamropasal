@extends('backend.admin.layouts.app')
@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Merchant</h1>
          </div>
          <div class="col-md-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active"> Merchant Update</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-md-12">
    			<div class="card">
    				<div class="card-header">
    					<h6>Merchant Update</h6>
    				</div>
    			{!! Form::model($merchant, ['method' => 'PATCH','route' => ['merchants.update', $merchant->id]]) !!}
    				<div class="card-body">
					    <div class="col-xs-12 col-sm-12 col-md-12">
					        <div class="form-group">
					            <strong>Merchant Name:</strong>
					            {!! Form::text('name', null, array('placeholder' => 'Enter Merchant Name','class' => 'form-control')) !!}
					        </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
					        <div class="form-group">
					            <strong>Merchant Email:</strong>
					            {!! Form::text('email', null, array('placeholder' => 'Enter Merchant Email','class' => 'form-control')) !!}
					        </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
					        <div class="form-group">
					            <strong>Merchant Email:</strong>
					            {!! Form::number('is_active', null, array('placeholder' => 'Enter Merchant Email','class' => 'form-control')) !!}
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