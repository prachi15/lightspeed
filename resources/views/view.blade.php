@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="float-sm-left">{{ ucfirst($username) }}'s Project List</h1>
            <a href="{{ url('users') }}" class="btn btn-info float-right">Back</a>
          </div>
        </div>
      </div>
    </section>
    
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table id="project_list" class="table table-bordered table-striped data-table">
                <thead>
                <tr>
                  <th>Project</th>
                  <th>Members</th>
                  <th>Estimated Hours</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($users as $project => $user)
                  <tr>
                    <td>{{ $project }}</td>
                    @if(is_array($user))
                        <td>{{ implode(', ',array_map(function($item) { return ucfirst($item['username']); }, $user)) }}</td>
                        <td>{{ array_sum(array_map(function($item) { return $item['total_hours']; }, $user)) }}</td>
                    @else
                      <td>{{ $user['username'] }}</td>
                      <td>{{ $user['total_hours'] }}</td>
                    @endif
                    <td><a href="{{ route('summary',['project' => $project]) }}" class="btn btn-xs btn-primary">View</a> </td>
                  </tr>
                  @endforeach
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
  $(document).ready(function () {
    $('#project_list').DataTable();
  });
</script>
@endsection