@extends('backend.admin.layouts.app')
@section('title','HamroPasal | Orders')
@section('content')
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Order</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('orders.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Order</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 @include('sweetalert::alert')
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i>HamroPasal.
                    <small class="float-right">Date:{{$order->created_at->format('d M Y')}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Hamro Pasal</strong><br>
                    Banasthali<br>
                    Kathmandu, Nepal<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>{{ $order->name}}</strong><br>
                    {{ $order->location}}<br>
                    {{$order->address}}<br>
                    Phone: {{$order->phone}}<br>
                    Email: {{$order->email}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #{{$order->id}}</b><br>
                  <br>
                  <b>Order ID:</b> {{$order->id}}<br>
                  <b>Payment Due:</b> {{$order->updated_at}}<br>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Product</th>
                      <th>Serial #</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                   @foreach($order->orderproduct as $orderproduct)
                    <tr>
                      <td>{{ $orderproduct->quantity}}</td>
                      <td>{{$orderproduct->products->product_name}}</td>
                      <td>ORH{{$order->id}}</td>
                      <td>Rs {{$order->billing_subtotal}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">  
              <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due : {{ $order->created_at->format('m M Y')}}</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>Rs {{ $order->billing_subtotal }}</td>
                      </tr>
                      <tr>
                        <th>Discount</th>
                        <td>Rs {{ $order->billing_discount}}</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>Rs : {{ $order->billing_total}}</td>
                      </tr>
                      <tr>
                      	<th>Status</th>
                      <td><span class="badge badge-{{$order->shipped ===0 ? 'warning' :'success'}}">{{$order->shipped === 0 ? 'pending' :'shipped'}}</span></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              @if($order->shipped === 0)
              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                {!! Form::model($order, ['method' => 'PATCH','enctype' => 'multipart/form-data','route' => ['orders.update', $order->id]]) !!}
                  <button type="submit" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Proceed To Ship
                  </button>
                 {!! Form::close() !!}
                </div>
              </div>
              @endif
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>


@endsection