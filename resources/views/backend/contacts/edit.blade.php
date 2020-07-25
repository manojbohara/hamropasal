@extends('backend.admin.layouts.app')
@section('title','HamroPasal | Contact | Update')
@section('content')
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Contact</h1>
          </div>
          <div class="col-md-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active"> Contact</li>
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
    					<h6>Contact Create</h6>
    				</div>
    			{!! Form::model($contact, ['method' => 'PATCH','route' => ['contacts.update', $contact->id]]) !!}
    				<div class="card-body">
					    <div class="col-xs-12 col-sm-12 col-md-12">
					        <div class="form-group">
					            <strong>Contact Name:</strong>
					            {!! Form::text('contact_slog', null, array('placeholder' => 'Enter Contact Slog','class' => 'form-control')) !!}
					        </div>
					    </div>
               <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Address:</strong>
                      {!! Form::text('address', null, array('placeholder' => 'Enter Address','class' => 'form-control')) !!}
                  </div>
              </div>
               <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Phone:</strong>
                      {!! Form::text('phone', null, array('placeholder' => 'Enter Phone Number','class' => 'form-control')) !!}
                  </div>
              </div>
               <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Phone 1:</strong>
                      {!! Form::text('mobile', null, array('placeholder' => 'Enter Phone Number 1','class' => 'form-control')) !!}
                  </div>
              </div>
               <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Primary Email:</strong>
                      {!! Form::text('primary_email', null, array('placeholder' => 'Enter Primary Email','class' => 'form-control')) !!}
                  </div>
              </div>
               <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Secondary Email:</strong>
                      {!! Form::text('sec_email', null, array('placeholder' => 'Enter Secondary Email','class' => 'form-control')) !!}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Latitude:</strong>
                      {!! Form::text('latitude', null, array('placeholder' => 'Enter Longitude of your Store','class' => 'form-control')) !!}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Longitude:</strong>
                      {!! Form::text('longitude', null, array('placeholder' => 'Enter Longitude of your Store','class' => 'form-control')) !!}
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