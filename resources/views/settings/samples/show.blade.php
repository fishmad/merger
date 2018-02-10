@extends('_layouts.master')

@section('content')

      <div class="container-fluid">
        <div class="animate fadeIn">
          <div class="card">
            <div class="card-header">{{ $sample->title }}</div>
            <div class="card-body">

              <a href="{{ url('/settings/samples') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
              <a href="{{ url('/settings/samples/' . $sample->id . '/edit') }}" title="Edit Sample"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
              {!! Form::open([
                'method'=>'DELETE',
                'url' => ['settings/samples', $sample->id],
                'style' => 'display:inline'
              ]) !!}
              {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                'type' => 'submit',
                'class' => 'btn btn-danger btn-xs',
                'title' => 'Delete Sample',
                'onclick'=>'return confirm("Confirm delete?")'
              ))!!}
              {!! Form::close() !!}
              <br/>
              <br/>

              <div class="table-responsive">
                <table class="table table-borderless">
                  <tbody>
                      <tr>
                        <th>ID</th>
                        <td>{{ $sample->id }}</td>
                      </tr>
                      <tr>
                        <th>Title</th>
                        <td>{{ $sample->title }}</td>
                      </tr><tr>
                        <th>Email</th>
                        <td>{{ $sample->email }}</td>
                      </tr>
                      <tr>
                        <th>Date</th>
                        <td>{{ $sample->date }}</td>
                      </tr>
                  </tbody>
                </table>
              </div><!-- /.table-responsive -->
            </div><!-- /.card-body -->
          </div><!-- /.card -->
        </div><!-- /.animate.fadeIn -->
      </div><!-- /.container-fluid -->
@endsection
