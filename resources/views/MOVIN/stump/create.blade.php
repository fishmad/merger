@extends('admin._layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin._partials.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Stump</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/stump') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/admin/stump', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('admin.stump.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection