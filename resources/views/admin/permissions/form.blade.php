                          <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                              {!! Form::label('name', 'Permission Name', ['class' => 'col-md-4 control-label']) !!}
                              <div class="col-md-6">
                                  {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                  {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                              </div>
                          </div>

                          <div class="form-group {{ $errors->has('label') ? 'has-error' : ''}}">
                              {!! Form::label('label', 'Label', ['class' => 'col-md-4 control-label']) !!}
                              <div class="col-md-6">
                                  {!! Form::text('label', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                  {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                              </div>
                          </div>

                          <div class="form-group {{ $errors->has('item_order') ? 'has-error' : ''}}">
                              {!! Form::label('item_order', 'Item order', ['class' => 'col-md-4 control-label']) !!}
                              <div class="col-md-6">
                                  {!! Form::text('item_order', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                  {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                              </div>
                          </div>

                          <div class="form-group {{ $errors->has('groupings') ? 'has-error' : ''}}">
                              {!! Form::label('groupings', 'Groupings', ['class' => 'col-md-4 control-label']) !!}
                              <div class="col-md-6">
                                  {!! Form::text('groupings', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                  {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                              </div>
                          </div>
												
                          <div class="form-group {{ $errors->has('groupings_order') ? 'has-error' : ''}}">
                              {!! Form::label('groupings_order', 'Groupings Order', ['class' => 'col-md-4 control-label']) !!}
                              <div class="col-md-6">
                                  {!! Form::text('groupings_order', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                  {!! $errors->first('order', '<p class="help-block">:message</p>') !!}
                              </div>
                          </div>

                          <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                              {!! Form::label('role', 'Assigned to roles', ['class' => 'col-md-4 control-label']) !!}
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

                          <div class="form-group">
                              <div class="col-md-offset-4 col-md-4">
                                  {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
                              </div>
                          </div>
