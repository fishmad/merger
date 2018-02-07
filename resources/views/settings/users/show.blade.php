@extends('_layouts.master')
@section('content')

      <div class="container-fluid">
        <div class="animate fadeIn">
          <div class="card">

            <div class="card-header">
              Displaying User: {{ $user->name }}
            </div>

            <div class="card-body">
                <table class="table table-responsive-sm table-bordered">
                  <tbody>
                    <tr>
                      <th>ID</th>
                      <td>{{ $user->id }}</td>
                    </tr>
                    <tr>
                      <th>Name</th>
                      <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                      <th>Email</th>
                      <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                      <th>Roles</th>
                      <td>{{ $user->roles()->pluck('name')->implode('; ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                    </tr>
                    <tr>
                      <th>Date</th>
                      <td>{{ $user->created_at->format('F d, Y h:ia') }} </td>
                    </tr>
                  </tbody>
                </table>


              <div class="col-md-6 btn-toolbar">
                  <a href="{{ url('/settings/users') }}" class="btn btn-xs btn-default pull-right" title="Back"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                  <a href="{{ url('/settings/users/' . $user->id . '/edit') }}" class="btn btn-xs btn-default pull-right" title="Edit User"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>                       
                  <div class="btn-group pull-right">
                      {!! Form::open([
                          'method'=>'DELETE',
                          'url' => ['settings/users', $user->id]
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


            </div><!-- ./card-body-->
          </div><!-- ./card-->
        </div><!-- ./animate fadeIn-->
      </div><!-- ./container-fluid-->

@endsection