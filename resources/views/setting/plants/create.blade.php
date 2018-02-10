@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.partials.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Plant</div>
                    <div class="panel-body">
                        <a href="{{ url('/settings/plants') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/settings/plants', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('setting.plants.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
