@extends('_layouts.master')
@section('content')

      <div class="container-fluid">
        <div class="animate fadeIn">
          <div class="card">
            <div class="card-header">
              User Administration
            </div>
            <div class="card-body">
              <a href="{{ url('/settings/users/create') }}" class="btn btn-primary" title="Add User">
                <i class="fa fa-plus" aria-hidden="true"></i> Add User
              </a>
              {{--  {!! Form::open(['method' => 'GET', 'url' => '/settings/users', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
              <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> </button>
                </span>
              </div>
              {!! Form::close() !!}  --}}
              <br /><br />
              <table class="table table-responsive-sm table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    {{--  <th>Date/Time Added</th>  --}}
                    <th>User Roles</th>
                    <th class="text-right">Actions</th>
                  </tr>
                </thead>
                <tbody>
@foreach($users as $item)
                  <tr>
                    <td>{{ $loop->iteration or $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    {{--  <td>{{ $item->created_at->format('F d, Y h:ia') }}</td>  --}}
                    <td>
@foreach($item->roles()->pluck('name') as $roles )
                      <span class="badge badge-info">{{ $roles }}</span>
@endforeach
                      {{-- <span class="badge badge-success">{{ $item->roles()->pluck('name')->implode('; ') }}</span> --}}
                    </td>
                    {{-- Retrieve array of roles associated to a user and convert to string --}}
                    <td class="text-right">
                      <a href="{{ url('/settings/users/' . $item->id) }}" title="View Sample"><button class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                      <a href="{{ url('/settings/users/' . $item->id . '/edit') }}" title="Edit Sample"><button class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                      {!! Form::open([
                          'method'=>'DELETE',
                          'url' => ['/settings/users', $item->id],
                          'style' => 'display:inline'
                      ]) !!}
                          {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                          'type' => 'submit',
                          'class' => 'btn btn-danger btn-sm',
                          'title' => 'Delete User',
                          'onclick'=>'return confirm("Confirm delete?")'
                          )) !!}
                      {!! Form::close() !!}
                    </td>
                  </tr>
@endforeach
                </tbody>
              </table>
              {{--<div class="pagination-wrapper"> {!! $users->appends(['search' => Request::get('search')])->render() !!} </div>--}}
            </div><!-- ./card-body-->
          </div><!-- ./card-->
        </div><!-- ./animate fadeIn-->
      </div><!-- ./container-fluid-->

@endsection