@extends('backend.admin.layouts.app')
@section('title','HamroPasal | Blog')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blog</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Blog</li>
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
              <h3 class="card-title">HamroPasal Blog </h3>
              <a class="btn btn-success btn-sm float-sm-right" href="{{ route('blogs.create') }}"> Create New Blog</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="category" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Blog Title</th>
                   <th>Slug</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               @foreach($blogs as $blog)
                <tr>
                  <td>{{ $blog->title }}</td>
                  <td>{{ $blog->slug }}</td>
                  <td><img src="{{ asset('hamropasal/blog/'.$blog->image) }}" class="img img-responsive img-sm" alt="{{ $blog->title}}" /></td>
                  <td> 
                <a class="btn btn-info btn-sm" href="{{ route('blogs.show',$blog->id) }}">Show</a>
                <a class="btn btn-primary btn-sm" href="{{ route('blogs.edit',$blog->id) }}">Edit</a>
                {!! Form::open(['method' => 'DELETE','route' => ['blogs.destroy', $blog->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                {!! Form::close() !!}
                  </td>
                </tr>
              @endforeach
                </tbody>
                <tfoot>
                <tr>
                 <th>Blog Title</th>
                  <th>Slug</th>
                  <th>Image</th>
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
    $("#category").DataTable();
  });
</script>
@endsection
