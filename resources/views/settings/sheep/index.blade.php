@extends('_layouts.master')

@push('head_scripts')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/r-2.2.1/rg-1.0.2/sl-1.2.5/datatables.min.css"/>
@endpush

@section('content')
      <div class="container-fluid">
        <div class="animate fadeIn">
          <div class="card">
            <div class="card-header">
              Sheep Free 2
            </div>
            <div class="card-body">

              <a href="{{ url('/settings/sheep/create') }}" class="btn btn-success btn-sm" title="Add New Sheep">
                  <i class="fa fa-plus" aria-hidden="true"></i> Add New
              </a>

              {!! Form::open(['method' => 'GET', 'url' => '/settings/sheep', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
              <div class="input-group">
                  <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                  <span class="input-group-btn">
                      <button class="btn btn-default" type="submit">
                          <i class="fa fa-search"></i>
                      </button>
                  </span>
              </div>
              {!! Form::close() !!}

              <br/>
              <br/>

              <div class="table-responsive">

                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th>#</th><th>Name</th><th>Image</th><th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
@foreach($sheep as $item)
                    <tr>
                      <td>{{ $loop->iteration or $item->id }}</td>
                      <td>{{ $item->name }}</td><td>{{ $item->image }}</td>
                      <td>
                        <a href="{{ url('/settings/sheep/' . $item->id) }}" title="View Sheep"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                        <a href="{{ url('/settings/sheep/' . $item->id . '/edit') }}" title="Edit Sheep"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                          'method'=>'DELETE',
                          'url' => ['/settings/sheep', $item->id],
                          'style' => 'display:inline'
                        ]) !!}
                          {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Delete Sheep',
                            'onclick'=>'return confirm("Confirm delete?")'
                          )) !!}
                        {!! Form::close() !!}
                      </td>
                    </tr>
@endforeach
                  </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $sheep->appends(['search' => Request::get('search')])->render() !!} </div>
              </div><!-- /.table-responsive -->

            </div><!-- /.card-body -->
          </div><!-- /.card -->
        </div><!-- /.animate.fadeIn -->
      </div><!-- /.container-fluid -->
@endsection
