@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="float-sm-left">{{ $project_summary_name }}</h1>
            <a href="{{ url()->previous() }}" class="btn btn-info float-right">Back</a>
          </div>
        </div>
      </div>
    </section>
    
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table id="summary" class="table table-bordered table-striped data-table">
                <thead>
                <tr>
                  <th>Task</th>
                  <th>Assigned To</th>
                  <th>Estimated Hours <b id="total_hrs"></b></th>                  
                </tr>
                </thead>
                <tbody>
                  @foreach($data as $summary)
                  <tr>
                    <td>{{ $summary['task'] }}</td>
                    <td>{{ ucfirst($summary['username']) }}</td>
                    <td>{{ $summary['hours'] }}</td>
                  </tr>
                  @endforeach
                </tbody> 
                <tfoot>
                  <tr>
                    <th colspan="2" style="text-align: right;font-weight: 500;">Total Hours:</th>
                    <th></th>
                  </tr>
                </tfoot> 
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
  $(document).ready(function() {
    $('#summary').DataTable( {
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 2 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 2, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 2 ).footer() ).html(
                pageTotal+' Hours'
            );
        }
    });
  });
</script>
@endsection