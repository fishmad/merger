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
                              Permission: {{ $permission->name }}
                            </div>
                            <div class="col-md-6 btn-toolbar">
                                <a href="{{ url('/admin/permissions') }}" class="btn btn-xs btn-default pull-right" title="Back"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                                <a href="{{ url('/admin/permissions/' . $permission->id . '/edit') }}" class="btn btn-xs btn-default pull-right" title="Edit Permission"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>                       
                                <div class="btn-group pull-right">
                                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => ['admin/permissions/', $permission->id]
                                        ,
                                        {{--  'style' => 'display:inline'  --}}
                                    ]) !!}
                                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-xs btn-default pull-right',
                                            'title' => 'Delete Permission',
                                            'onclick'=>'return confirm("Confirm delete?")'
                                        ))!!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
																				<td>{{ $permission->id }}</td>
                                    </tr>
                                    <tr>
																				<th>Name</th>
																				<td>{{ $permission->name }}</td>
																		</tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
