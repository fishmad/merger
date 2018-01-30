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
                              Displaying User: {{ $user->name }}
                            </div>
                            <div class="col-md-6 btn-toolbar">
                                <a href="{{ url('/admin/users') }}" class="btn btn-xs btn-default pull-right" title="Back"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                                <a href="{{ url('/admin/users/' . $user->id . '/edit') }}" class="btn btn-xs btn-default pull-right" title="Edit User"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>                       
                                <div class="btn-group pull-right">
                                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => ['admin/users', $user->id]
                                        ,
                                        {{--  'style' => 'display:inline'  --}}
                                    ]) !!}
                                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-xs btn-default pull-right',
                                            'title' => 'Delete User',
                                            'onclick'=>'return confirm("Confirm delete?")'
                                        ))!!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                      <th>ID</th><td>{{ $user->id }}</td></tr>
                                      <tr><th>Name</th><td>{{ $user->name }}</td></tr>
                                      <tr><th>Email</th><td>{{ $user->email }}</td></tr>
                                      <tr><th>Roles</th><td>{{ $user->roles()->pluck('name')->implode('; ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                                      <tr><th>Date</th><td>{{ $user->created_at->format('F d, Y h:ia') }} </td></tr>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection