@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.partials.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Add New Role</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/roles') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/admin/roles', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('admin.roles.form')
													
																	
						@if(!$permissions->isEmpty())

							<h4>Assign Permissions</h4>

							@foreach ($permissions as $permission)
							
								{{ Form::checkbox('permissions[]',  $permission->id ) }}
								{{ Form::label($permission->name, ucfirst($permission->name)) }}<br>

							@endforeach

						@endif

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
