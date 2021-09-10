@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="float-sm-left">Manage Users</h1>
          </div>
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item active">Manage Users</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table id="user" class="table table-bordered table-striped data-table">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                </tbody>  
              </table>
            </div>            
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

@section('content-script')
<script type="text/javascript">
  $(document).ready(function()
  {
    var dataTable = $('#user').DataTable({
      processing: true,
      serverSide: true,
      "responsive": true,
      ajax: "{{ route('users') }}",
      columns: [
        { data: 'name', name: 'name' },
        { data: 'email', name: 'email' },
        {data: 'action', name: 'action', orderable: false, searchable: false},
      ]
    });

  });
</script>
@endsection