@extends('_layouts.master')

@push('head_scripts')

{{--  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">  --}}

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/r-2.2.1/rg-1.0.2/sl-1.2.5/datatables.min.css"/>

@endpush

@section('content')

      <div class="container-fluid">
        <div class="animate fadeIn">
          <div class="card">

            {{--  <div class="card-header">
              User Administration
            </div>  --}}


            <div class="card-header">
              <i class="fa fa-edit"></i> DataTables
              <div class="card-actions">
                <a href="https://datatables.net"><small class="text-muted">docs</small></a>
              </div>
            </div>

            <div class="card-body">

              <a href="{{ url('/admin/samples/create') }}" class="btn btn-success btn-sm" title="Add New Sample">
                  <i class="fa fa-plus" aria-hidden="true"></i> Add New
              </a>

              {{--  {!! Form::open(['method' => 'GET', 'url' => '/admin/samples', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
              <div class="input-group">
                  <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                  <span class="input-group-btn">
                      <button class="btn btn-default" type="submit">
                          <i class="fa fa-search"></i>
                      </button>
                  </span>
              </div>
              {!! Form::close() !!}  --}}

              <br/>
              <br/>

              {{--  table table-responsive-sm table-bordered  --}}

              <table id="daya-tabla" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Email</th>
                    <th>Created</th>
                    <th>Updated</th>
					<th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  
                {{--
                @foreach($samples as $item)
                  <tr>
                    <td>{{ $loop->iteration or $item->id }}</td>
                    <td>{{ $item->title }}</td><td>{{ $item->email }}</td><td>{{ $item->date }}</td>
                    <td>
                      <a href="{{ url('/admin/samples/' . $item->id) }}" title="View Sample"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                      <a href="{{ url('/admin/samples/' . $item->id . '/edit') }}" title="Edit Sample"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                      {!! Form::open([
                        'method'=>'DELETE',
                        'url' => ['/admin/samples', $item->id],
                        'style' => 'display:inline'
                      ]) !!}
                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Delete Sample',
                            'onclick'=>'return confirm("Confirm delete?")'
                        )) !!}
                      {!! Form::close() !!}
                    </td>
					<td></td>
                  </tr>
                @endforeach
                --}}
                     
                </tbody>
              </table>
              {{--  <div class="pagination-wrapper"> {!! $samples->appends(['search' => Request::get('search')])->render() !!} </div>  --}}

            </div><!-- ./card-body-->
          </div><!-- ./card-->
        </div><!-- ./animate fadeIn-->
      </div><!-- ./container-fluid-->
@endsection

@push('foot_scripts')

<script>



$(function() {
    $('#daya-tabla').DataTable({
        processing: true,
        serverSide: true,
		responsive: true,
        colReorder: true,
        ajax: '{!! route('settings.samples.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'title', name: 'title' },
            { data: 'email', name: 'email' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'action', name: 'action' }
        ],
    
	
	
        dom:
          "<'row'<'col-sm-4'B><'col-sm-4 text-center'l><'col-sm-4 text-right'f>>" +
          "<'row'<'col-sm-12'tr>>" +
          "<'row'<'col-sm-5'i><'col-sm-7'p>>",

        buttons: [
          { 
            "extend": 'copy', 
            "text":'<i class="fa fa-plus"></i> Copy',
            "className": 'btn-success btn-sm'
          },
          { 
            "extend": 'excel', 
            "text":'<i class="fa fa-plus"></i> Excel',
            "className": 'btn-success btn-sm' 
          },
          { 
            "extend": 'pdf', 
            "text":'<i class="fa fa-plus"></i> PDF',
            "className": 'btn-success btn-sm' 
          },
          {
            text: 'My button',
            action: function ( e, dt, node, config ) {
                alert( 'Button activated' );
            },
          },

          

        ],
	
	
	
	
	});
});	

</script>


<!-- DataTables -->
{{--  
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
--}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/r-2.2.1/rg-1.0.2/sl-1.2.5/datatables.min.js"></script>

@endpush
