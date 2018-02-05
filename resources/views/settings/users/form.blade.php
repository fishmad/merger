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

@if($requiredLoggedIn == 'required') 
<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
@else
<div class="form-group">
@endif
    {!! Form::label('password', ($requiredLoggedIn == 'required') ? 'Password*' : 'Password', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::password('password', ($requiredLoggedIn == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        @if($requiredLoggedIn == 'required') 
          @if ($errors->has('password'))
              <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('password', ($requiredLoggedIn == 'required') ? 'Confirm Password*' : 'Confirm Password', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::password('password_confirmation', ($requiredLoggedIn == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div>

<hr />

@if($requiredLoggedIn == 'required') 

  {{--  Create user form with required* --}}
  <div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
      {!! Form::label('role', 'Has roles', ['class' => 'col-md-4 control-label']) !!}
      <div class="col-md-6">
            @foreach ($roles as $role) 
                <div class="checkbox">
                  <label>
                    {{ Form::checkbox('roles[]',$role->id) }}
                    {{ ucfirst($role->name) }}
                  </label>
                </div>
            @endforeach
      </div>
  </div>

@else

  {{--  Edit User form without required* --}}
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

@endif

<hr />

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
