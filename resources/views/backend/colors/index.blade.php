@extends('backend.admin.layouts.app')
@section('title','HamroPasal | Color')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Colors</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Colors</li>
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
              <h3 class="card-title">HamroPasal Colors </h3>
              <a class="btn btn-success btn-sm float-sm-right" href="{{ route('colors.create') }}"> Create New Colors</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="size" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Color Name</th>
                  <th>Color Value</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               @foreach($colors as $color)
                <tr>
                  <td>{{ $color->color_name }}</td>
                  <td>{{ $color->value }} </td>
                  <td> 
                 <a class="btn btn-primary btn-sm" href="{{ route('colors.edit',$color->id) }}">Edit</a>   
                {!! Form::open(['method' => 'DELETE','route' => ['colors.destroy', $color->id],'style'=>'display:inline']) !!}

                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}

                {!! Form::close() !!}

                  </td>
                </tr>
              @endforeach
                </tbody>
                <tfoot>
                <tr>
                 <th> Color Name</th>
                 <th> Color Value</th>
                  <th>Action </th>               
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
    $("#size").DataTable();
  });
</script>
@endsection
