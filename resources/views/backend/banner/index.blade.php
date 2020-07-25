@extends('backend.admin.layouts.app')
@section('title','HamroPasal | Banner')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Banners</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Banner</li>
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
              <h3 class="card-title">HamroPasal Banners</h3>
              <a class="btn btn-success btn-sm float-sm-right" href="{{ route('banners.create') }}"> Create New Banner</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="banners" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Banner Title</th>
                  <th>Image</th>
                  <th>Url</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($banners as $key => $banner)
                <tr>
                  <td>{{ $banner->title }}</td>
                  <td><img src="{{ asset('hamropasal/banner/'.$banner->image) }}" class="img img-responsive img-sm" alt="{{ $banner->title}}" /></td>
                  <td>{{ $banner->url }}</td>
                  <td>{{ $banner->status }}</td>
                  <td> 
               <a class="btn btn-info btn-sm" href="{{ route('banners.show',$banner->id) }}">Show</a>
               <a class="btn btn-primary btn-sm" href="{{ route('banners.edit',$banner->id) }}">Edit</a>
                {!! Form::open(['method' => 'DELETE','route' => ['banners.destroy', $banner->id],'style'=>'display:inline']) !!}

                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}

                {!! Form::close() !!}
                  </td>
                </tr>
              @endforeach
                </tbody>
                <tfoot>
                <tr>
                 <th>Banner Title</th>
                  <th>Image</th>
                  <th>Url</th>
                  <th>Status</th>
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
    $("#banners").DataTable();
  });
</script>
@endsection
