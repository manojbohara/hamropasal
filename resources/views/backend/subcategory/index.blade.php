@extends('backend.admin.layouts.app')
@section('title','HamroPasal | SubCategory ')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subcategory</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Subcategory</li>
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
              <h3 class="card-title">HamroPasal Subcategories </h3>
              <a class="btn btn-success btn-sm float-sm-right" href="{{ route('subcategories.create') }}"> Create New Subcategories</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="subcategory" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Category Name</th>
                  <th>Subcategory Name</th>
                  <th>Slug</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               @foreach($subcategories as $subcategory)
                <tr>
                  <td>{{ $subcategory->categories->name }}</td>
                  <td>{{ $subcategory->name }}</td>
                  <td>{{ $subcategory->slug }}</td>
                  <td>{{ $subcategory->description}}</td>
                  <td> 
                	<a class="btn btn-info btn-sm" href="{{ route('subcategories.show',$subcategory->id) }}">Show</a>

               <a class="btn btn-primary btn-sm" href="{{ route('subcategories.edit',$subcategory->id) }}">Edit</a>

                {!! Form::open(['method' => 'DELETE','route' => ['subcategories.destroy', $subcategory->id],'style'=>'display:inline']) !!}

                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}

                {!! Form::close() !!}

                  </td>
                </tr>
              @endforeach
                </tbody>
                <tfoot>
                <tr>
                 <th> Category Name</th>
                 <th> Subcategory Name</th>
                 <th> Slug</th>
                  <th>Description </th>  
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
    $("#subcategory").DataTable();
  });
</script>
@endsection
