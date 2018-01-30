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
                              Edit User: {{ $user->name }}
                            </div>
                            <div class="col-md-6 btn-toolbar">
                                <a href="{{ url('/admin/users') }}" class="btn btn-xs btn-default pull-right" title="Back"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                          
                        {{ Form::model($user, [
                          'method' => 'PUT',
                          'route' => ['users.update', $user->id], 
                          'class' => 'form-horizontal',
                          'files' => true
                        ]) }}

                          <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                              {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
                              <div class="col-md-6">
                                  {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                  {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                              </div>
                          </div>

                          <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                              {!! Form::label('email', 'Email', ['class' => 'col-md-4 control-label']) !!}
                              <div class="col-md-6">
                                  {!! Form::email('email', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                  {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                              </div>
                          </div>

                          <div class="form-group">
                              {!! Form::label('password', 'Password', ['class' => 'col-md-4 control-label']) !!}
                              <div class="col-md-6">
                                  {!! Form::password('password', ['class' => 'form-control','placeholder' => 'Leave blank to keep current password.']) !!}
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                              </div>
                          </div>

                          <hr />

                            <div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
                                {!! Form::label('role', 'Has roles', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                  @if(!$roles->isEmpty())
                                      @foreach ($roles as $role) 
                                          <div class="checkbox">
                                            <label>
                                              {{ Form::checkbox('roles[]',$role->id, $user->roles) }}
                                              {{ ucfirst($role->name) }}
                                            </label>
                                          </div>
                                      @endforeach
                                  @endif
                                </div>
                            </div>

                          <hr />

                          <div class="form-group">
                              <div class="col-md-offset-4 col-md-4">
                                  {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                              </div>
                          </div>

                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection