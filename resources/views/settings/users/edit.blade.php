@extends('_layouts.master')
@section('content')

      <div class="container-fluid">
        <div class="animate fadeIn">
          <div class="card">
            <div class="card-header">
              Edit User: {{ $user->name }}
            </div>
            <div class="card-body">
                          
              {{ Form::model($user, [
                'method' => 'PUT',
                'route' => ['users.update', $user->id], 
                'class' => 'form-horizontal',
                'files' => true
              ]) }}

                <div class="form-group row {{ $errors->has('name') ? 'has-error' : ''}}">
                    {!! Form::label('name', 'Name', ['class' => 'col-md-3 col-form-label']) !!}
                    <div class="col-md-9">
                        {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control is-invalid']) !!}
                        {!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('email') ? 'has-error' : ''}}">
                    {!! Form::label('email', 'Email', ['class' => 'col-md-3 col-form-label']) !!}
                    <div class="col-md-9">
                        {!! Form::email('email', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>

                <div class="form-group row">
                    {!! Form::label('password', 'Password', ['class' => 'col-md-3 col-form-label']) !!}
                    <div class="col-md-9">
                        {!! Form::password('password', ['class' => 'form-control','placeholder' => 'Leave blank to keep current password.']) !!}
                          @if ($errors->has('password'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
                    </div>
                </div>

                <hr />

                  <div class="form-group row {{ $errors->has('role') ? 'has-error' : ''}}">
                      {!! Form::label('role', 'Has roles', ['class' => 'col-md-3 col-form-label']) !!}
                      <div class="col-md-9">
                        @if(!$roles->isEmpty())
                            @foreach ($roles as $role) 
                                <div class="checkbox">
                                  <label>
                                    {{ Form::checkbox('roles[]', $role->id, $user->roles) }}
                                    {{ ucfirst($role->name) }}
                                  </label>
                                </div>
                            @endforeach
                        @endif
                      </div>
                  </div>

                <hr />

                <div class="form-group row">
                    <div class="offset-md-3 col-md-9">
                        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>

              {{ Form::close() }}

            </div><!-- ./card-body-->
          </div><!-- ./card-->
        </div><!-- ./animate fadeIn-->
      </div><!-- ./container-fluid-->

@endsection