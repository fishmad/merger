<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('role', 'Role has these permissions', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
      {{--  @if(!$permissions->isEmpty())  --}}

        <?php $permissionsByGroup = $permissions; ?>
            @foreach ($permissionsByGroup as $groupings => $permissions)
              <div class="col-md-6">
                <h4>{{ $groupings }}</h4> 
                  @foreach ($permissions as $permission)
                      <div class="checkbox">
                        <label>
                          {{ Form::checkbox('permissions[]', $permission->id ) }}
                          {{ $permission->item_order }} {{ ucfirst($permission->label) }}
                        </label>
                      </div>
                    @endforeach
              </div>
            @endforeach

      {{--  @endif  --}}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>