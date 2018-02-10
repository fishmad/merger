@extends('_layouts.master')

@push('head_scripts')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/r-2.2.1/rg-1.0.2/sl-1.2.5/datatables.min.css"/>
@endpush

@section('content')

      <div class="container-fluid">
        <div class="animate fadeIn">
          <div class="card">
            <div class="card-header">Samples Register</div>
            <div class="card-body">

              {{--  <a href="{{ url('/settings/samples/create') }}" class="btn btn-success btn-sm" title="Add New Sample">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
              </a>
              <br/>
              <br/>  --}}

              <table id="daya-tabla" class="table table-responsive-sm table-sm" cellspacing="0" width="100%">
                <thead>
                  <tr>
@foreach ($dbFields as $dbField => $name)
@if ($name === "created_at" || $name === "updated_at" || $name === "id" || $name === "description" )
@else
                    <th>{{ ucfirst($name) }}</th>
@endif
@endforeach
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                </tbody><!-- /.DataTabels -->
              </table>
            </div><!-- ./card-body-->
          </div><!-- ./card-->
        </div><!-- ./animate fadeIn-->
      </div><!-- ./container-fluid-->
@endsection

@push('scripts')
<script>
$(function() {
  $('#daya-tabla').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    colReorder: true,
    ajax: '{!! route('settings.samples.datatables') !!}',
    columns: [
@foreach ($dbFields as $dbField => $name)
@if ($name === "created_at" || $name === "updated_at" || $name === "id" || $name === "description" )
@else
      { data: '{!! $name !!}', name: '{!! $name !!}' },
@endif
@endforeach
      { data: 'action', name: 'action', orderable: false, searchable: false }
    ],
    order: [[0, 'asc']],
    dom:
      "<'row'<'col-sm-4'B><'col-sm-4 text-center'l><'col-sm-4 text-right'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-5'i><'col-sm-7'p>>",
    buttons: [
      {
        text: '<i class="fa fa-plus-square-o"></i> New Record',
        "className": 'btn-outline-primary btn-sm',
        action: function ( e, dt, node, config ) {
          window.location = '/settings/samples/create';
        },
      },
      { 
        "extend": 'copy', 
        "text":'<i class="fa fa-copy"></i> Copy',
        "className": 'btn-outline-primary btn-sm'
      },
      { 
        "extend": 'excel', 
        "text":'<i class="fa fa-file-excel-o"></i> Excel',
        "className": 'btn-outline-primary btn-sm'
      },
      { 
        "extend": 'pdf', 
        "text":'<i class="fa fa-file-pdf-o"></i> PDF',
        "className": 'btn-outline-primary btn-sm'
      },
    ],
  });
});	
</script>

<script>
$('#daya-tabla').on('click', '.btn-delete[data-remote]', function (e) { 
    e.preventDefault();
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = $(this).data('remote');
    // confirm then
    if (confirm('Are you sure you want to delete this?')) {
        $.ajax({
            url: url,
            type: 'DELETE',
            dataType: 'json',
            data: {method: '_DELETE', submit: true}
        }).always(function (data) {
            $('#daya-tabla').DataTable().draw(false);
        });
    }else
        alert("You have cancelled!");
});
</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/r-2.2.1/rg-1.0.2/sl-1.2.5/datatables.min.js"></script>
@endpush