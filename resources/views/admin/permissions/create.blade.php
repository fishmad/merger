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
                              Add New Permission
                            </div>
                            <div class="col-md-6 btn-toolbar">
                                <a href="{{ url('/admin/permissions') }}" class="btn btn-xs btn-default pull-right" title="Back"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif

                        {!! Form::open(['url' => '/admin/permissions', 'class' => 'form-horizontal', 'files' => true]) !!}

                          {{--  @include ('admin.permissions.form')  --}}

                          <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                              {!! Form::label('name', 'Permission Name', ['class' => 'col-md-4 control-label']) !!}
                              <div class="col-md-6">
                                  {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                  {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                              </div>
                          </div>

                          <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                              {!! Form::label('role', 'Assigned to what roles?', ['class' => 'col-md-4 control-label']) !!}
                              <div class="col-md-6">
                                @if(!$roles->isEmpty())
                                    @foreach ($roles as $role) 
                                        <div class="checkbox">
                                          <label>
                                            {{ Form::checkbox('roles[]',  $role->id ) }}
                                            {{ ucfirst($role->name) }}
                                          </label>
                                        </div>
                                    @endforeach
                                @endif
                              </div>
                          </div>
												
                          {{--  @if(!$roles->isEmpty())
                              <h4>Assign Permission to Roles</h4>
                              @foreach ($roles as $role) 
                                  {{ Form::checkbox('roles[]',  $role->id ) }}
                                  {{ Form::label($role->name, ucfirst($role->name)) }}<br>
                              @endforeach
                          @endif  --}}

                          <div class="form-group">
                              <div class="col-md-offset-4 col-md-4">
                                  {{--  {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}  --}}
                                  {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}
                              </div>
                          </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
