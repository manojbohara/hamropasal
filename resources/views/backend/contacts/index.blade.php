@extends('backend.admin.layouts.app')
@section('title','HamroPasal | Contact')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Contact</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Contact</li>
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
              <h3 class="card-title">HamroPasal Contact </h3>
              <a class="btn btn-success btn-sm float-sm-right" href="{{ route('contacts.create') }}"> Create New Contact</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="category" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Contact Slog</th>
                   <th>Address</th>
                  <th>Phone</th>
                  <th>Primary Email</th>
                  <th>Latitude</th>
                  <th>Longitude</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               @foreach($contacts as $contact)
                <tr>
                  <td>{{ $contact->contact_slog }}</td>
                  <td>{{ $contact->address }}</td>
                  <td>{{ $contact->phone }}</td>
                  <td>{{ $contact->primary_email }}</td>
                  <td>{{ $contact->latitude }}</td>
                  <td>{{ $contact->longitude }}</td>
                  <td> 
                	<a class="btn btn-info btn-sm" href="{{ route('contacts.show',$contact->id) }}">Show</a>

               <a class="btn btn-primary btn-sm" href="{{ route('contacts.edit',$contact->id) }}">Edit</a>

                {!! Form::open(['method' => 'DELETE','route' => ['contacts.destroy', $contact->id],'style'=>'display:inline']) !!}

                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}

                {!! Form::close() !!}

                  </td>
                </tr>
              @endforeach
                </tbody>
                <tfoot>
                <tr>
                 <th>Contact Slog</th>
                  <th>Address</th>
                  <th>Phone</th>
                  <th>Primary Email</th>
                  <th>Latitude</th>
                  <th>Longitude</th>
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
    $("#category").DataTable();
  });
</script>
@endsection
