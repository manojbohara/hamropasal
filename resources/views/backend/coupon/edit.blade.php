@extends('backend.admin.layouts.app')
@section('title','HamroPasal | Coupon | Create')
@section('content')
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Coupon</h1>
          </div>
          <div class="col-md-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active"> Coupon</li>
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
    					<h6>Coupon Create</h6>
    				</div>
    			{!! Form::model($coupon, ['method' => 'PATCH','route' => ['coupons.update', $coupon->id]]) !!}
    				<div class="card-body">
					    <div class="col-xs-12 col-sm-12 col-md-12">
					        <div class="form-group">
					            <strong>Coupon Code:</strong>
					            {!! Form::text('code', null, array('placeholder' => 'Enter Coupon Code','class' => 'form-control')) !!}
					        </div>
					    </div>
					      <div class="col-xs-12 col-sm-12 col-md-12">
					        <div class="form-group">
					            <strong>Type:</strong>
					            {!! Form::text('type', null, array('placeholder' => 'Enter Coupon Type','class' => 'form-control')) !!}
					        </div>
					    </div>
					      <div class="col-xs-12 col-sm-12 col-md-12">
					        <div class="form-group">
					            <strong>Coupon Value:</strong>
					            {!! Form::number('value', null, array('placeholder' => 'Enter Coupon Value','class' => 'form-control')) !!}
					        </div>
					    </div>
					      <div class="col-xs-12 col-sm-12 col-md-12">
					        <div class="form-group">
					            <strong>Coupon percent off:</strong>
					            {!! Form::number('percent_off', null, array('placeholder' => 'Enter Coupon Percent off','class' => 'form-control')) !!}
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