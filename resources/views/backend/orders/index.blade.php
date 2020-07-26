@extends('backend.admin.layouts.app')
@section('title','HamroPasal | Order')
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
 			<div class="col-sm-12">
 			     <div class="card">
            <div class="card-header border-transparent">
              <h3 class="card-title">Latest Orders</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="orders">
                  <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($orders as $order)
                  <tr>
                    <td><a href="{{ route('orders.show',$order->id) }}">ORHP{{$order->id}}</a></td>
                    <td>{{$order->name}}</td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20">{{$order->billing_total}}</div>
                    </td>
                    <td><span class="badge badge-{{$order->shipped ===0 ? 'warning' :'success'}}">{{$order->shipped === 0 ? 'pending' :'shipped'}}</span></td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
          </div>	
 			</div>
 		</div>
 	</div>
 	
 </section>
 <script src="{{ asset('hamropasal/backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<!-- page script -->
<script>
  $(function () {
    $("#orders").DataTable();
  });
</script>
@endsection