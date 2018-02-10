<div class="form-group row {{ $errors->has('title') ? 'has-error' : ''}}">
  {!! Form::label('title', 'Title', ['class' => 'col-md-2 col-form-label']) !!}
  <div class="col-md-9">
    {!! Form::text('title', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group row {{ $errors->has('email') ? 'has-error' : ''}}">
  {!! Form::label('email', 'Email', ['class' => 'col-md-2 col-form-label']) !!}
  <div class="col-md-9">
    {!! Form::email('email', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group row {{ $errors->has('date') ? 'has-error' : ''}}">
  {!! Form::label('date', 'Date', ['class' => 'col-md-2 col-form-label']) !!}
  <div class="col-md-9">
    {!! Form::date('date', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group row {{ $errors->has('description') ? 'has-error' : ''}}">
  {!! Form::label('description', 'Description', ['class' => 'col-md-2 col-form-label']) !!}
  <div class="col-md-9">
    {!! Form::textarea('description', null, ('' == 'required') ? ['class' => 'form-control form-control-lg', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="row">
  <div class="offset-md-2 col-md-4">
    {{ Form::button('<i class="fa fa-dot-circle-o"></i> Submit', ['type' => 'submit', 'class' => 'btn btn-primary'] ) }}
    <a href="{{ url('/settings/samples') }}" class="btn btn-danger" title="Back"><i class="fa fa-ban"></i> Cancel</a>
  </div>
</div>