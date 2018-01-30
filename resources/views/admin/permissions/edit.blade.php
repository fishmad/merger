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
                              Edit Permission: {{ $permission->name }}
                            </div>
                            <div class="col-md-6 btn-toolbar">
                                <a href="{{ url('/admin/permissions') }}" class="btn btn-xs btn-default pull-right" title="Back"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($permission, [
                            'method' => 'PATCH',
                            'url' => ['/admin/permissions', $permission->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}


                        @include ('admin.permissions.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection