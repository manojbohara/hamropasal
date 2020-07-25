@extends('backend.admin.layouts.app')
@section('title','HamroPasal | Coupon')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Coupon</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Coupon</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @include('sweetalert::alert')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">HamroPasal Coupon </h3>
              <a class="btn btn-success btn-sm float-sm-right" href="{{ route('coupons.create') }}"> Create New Coupon</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="coupon" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Coupon Code</th>
                   <th>Type</th>
                  <th>Value</th>
                  <th>Percent Off</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               @foreach($coupons as $coupon)
                <tr>
                  <td>{{ $coupon->code }}</td>
                  <td>{{ $coupon->type }}</td>
                  <td>{{ $coupon->value}}</td>
                  <td>{{ $coupon->percent_off}}</td>
                  <td> 
               <a class="btn btn-primary btn-sm" href="{{ route('coupons.edit',$coupon->id) }}">Edit</a>

                {!! Form::open(['method' => 'DELETE','route' => ['coupons.destroy', $coupon->id],'style'=>'display:inline']) !!}

                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}

                {!! Form::close() !!}

                  </td>
                </tr>
              @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Coupon Code</th>
                  <th>Type</th>
                  <th>Value</th>
                  <th>Percent Off</th>
                  <th>Action</th>              
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('hamropasal/backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<!-- page script -->
<script>
  $(function () {
    $("#coupon").DataTable();
  });
</script>
@endsection
