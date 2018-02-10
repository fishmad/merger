@extends('_layouts.master')

@section('content')

      <div class="container-fluid">
        <div class="animate fadeIn">
          <div class="card">
            <div class="card-header">Create New Sample</div>
            <div class="card-body">
              <a href="{{ url('/settings/samples') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <br />
                <br />

                @if ($errors->any())
                <ul class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
                @endif

                {!! Form::open(['url' => '/settings/samples', 'class' => 'form-horizontal', 'files' => true]) !!}
                @include ('settings.samples.form')
                {!! Form::close() !!}

            </div><!-- /.card-body -->
          </div><!-- /.card -->
        </div><!-- /.animate.fadeIn -->
      </div><!-- /.container-fluid -->
@endsection
