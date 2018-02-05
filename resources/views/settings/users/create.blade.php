@extends('_layouts.master')
@section('content')

      <div class="container-fluid">
        <div class="animate fadeIn">
          <div class="card">
            <div class="card-header">
              Create New User
              </div>
            <div class="card-body">
              {{--  <a href="{{ url('/settings/users') }}" class="btn btn-xs btn-default float-right" title="Back"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>  
              <br /><br />  --}}
              {{ Form::open([
                  'url' => ['settings/users'],
                  'class' => 'form-horizontal needs-validation',
                  'novalidate' => ''
              ]) }}


                <div class="form-group row">
                  {!! Form::label('name', 'Name', ['class' => 'col-md-3 col-form-label']) !!}
                  <div class="col-md-9">
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => '']) !!}
                    <div class="invalid-feedback">You must enter a name.</div>
                      @if ($errors->any())
                        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                      @endif
                  </div>
                </div>

                <div class="form-group row">
                  {!! Form::label('email', 'Email', ['class' => 'col-md-3 col-form-label']) !!}
                  <div class="col-md-9">
                    {!! Form::email('email', null, ['class' => 'form-control', 'required' => '']) !!}
                    <div class="invalid-feedback">You must enter a valid email.</div>
                    @if ($errors->any())
                      <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                    @endif
                  </div>
                </div>

                <div class="form-group row">
                  {!! Form::label('password', 'Password*', ['class' => 'col-md-3 col-form-label']) !!}
                  <div class="col-md-9">
                    {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
                    <div class="invalid-feedback">You must enter a password.</div>
                    @if ($errors->has('password'))
                      <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                    @endif
                  </div>
                </div>

                {{--  <div class="form-group row">
                  {!! Form::label('password', 'Confirm Password*', ['class' => 'col-md-3 col-form-label']) !!}
                  <div class="col-md-9">
                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required']) !!}
                    <div class="invalid-feedback">You must enter a matchin password.</div>
                  </div>
                </div>  --}}

                <hr />

                <div class="form-group row {{ $errors->has('role') ? 'has-error' : ''}}">
                  {!! Form::label('role', 'Give role to user', ['class' => 'col-md-3 col-form-label']) !!}
                  <div class="col-md-9">
                    @foreach ($roles as $role) 
                      <div class="checkbox">
                        <label>
                          {{ Form::checkbox('roles[]', $role->id) }}
                          {{ ucfirst($role->name) }}
                        </label>
                      </div>
                    @endforeach
                  </div>
                </div>

                <hr />

                <div class="form-group row">
                  <div class="offset-md-3 col-md-9">
                    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Submit', ['class' => 'btn btn-primary']) !!}
                  </div>
                </div>
              {{ Form::close() }}
            </div><!-- ./card-body-->
          </div><!-- ./card-->
        </div><!-- ./animate fadeIn-->
      </div><!-- ./container-fluid-->

@endsection


<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>