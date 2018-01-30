@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.partials.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
				
                    <div class="panel-heading">

                        <div class="row">
                          <div class="col-md-6">
                            User Administration
                          </div>
                          <div class="col-md-6 btn-toolbar">
                            <a href="{{ route('permissions.index') }}" class="btn btn-xs btn-default pull-right">Permissions</a></h1>
                            <a href="{{ route('roles.index') }}" class="btn btn-xs btn-default pull-right">Roles</a>
                            <a href="{{ route('users.index') }}" class="btn btn-xs btn-primary pull-right">Users</a>
                          </div>
                        </div>
                        
                    </div>
				
                    <div class="panel-body">
                        <a href="{{ url('/admin/users/create') }}" class="btn btn-success btn-sm" title="Add New Sample">
                            <i class="fa fa-plus" aria-hidden="true"></i> Create New User
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/users', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                      <td>{{ $item->roles()->pluck('name')->implode('; ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                                      <td class="text-right">
                                          <a href="{{ url('/admin/users/' . $item->id) }}" title="View Sample"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                          <a href="{{ url('/admin/users/' . $item->id . '/edit') }}" title="Edit Sample"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                          
                                          {!! Form::open([
                                              'method'=>'DELETE',
                                              'url' => ['/admin/users', $item->id],
                                              'style' => 'display:inline'
                                          ]) !!}
                                              {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                              'type' => 'submit',
                                              'class' => 'btn btn-danger btn-xs',
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
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
