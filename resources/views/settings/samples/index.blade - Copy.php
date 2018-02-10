@foreach ($columns as $column => $name)
@if ($name === "created_at" || $name === "updated_at" )
{{--  {{ $name }}: false,  --}}
@else 
<th>{{ $name }}</th>
@endif
@endforeach








@extends('_layouts.master')

@section('content')
			<div class="container">
				<div class="row">
					<div class="col">

                        <a href="{{ url('/admin/samples/create') }}" class="btn btn-success btn-sm" title="Add New Sample">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/samples', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>

						<table class="table table-borderless">
							<thead>
								<tr>
									<th>#</th><th>Title</th><th>Email</th><th>Date</th><th>Actions</th>
								</tr>
							</thead>
							<tbody>
							@foreach($samples as $item)
								<tr>
									<td>{{ $loop->iteration or $item->id }}</td>
									<td>{{ $item->title }}</td><td>{{ $item->email }}</td><td>{{ $item->date }}</td>
									<td>
										<a href="{{ url('/admin/samples/' . $item->id) }}" title="View Sample"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
										<a href="{{ url('/admin/samples/' . $item->id . '/edit') }}" title="Edit Sample"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
										{!! Form::open([
											'method'=>'DELETE',
											'url' => ['/admin/samples', $item->id],
											'style' => 'display:inline'
										]) !!}
											{!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
													'type' => 'submit',
													'class' => 'btn btn-danger btn-xs',
													'title' => 'Delete Sample',
													'onclick'=>'return confirm("Confirm delete?")'
											)) !!}
										{!! Form::close() !!}
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
						<div class="pagination-wrapper"> {!! $samples->appends(['search' => Request::get('search')])->render() !!} </div>

				</div>
			</div>
		</div>
@endsection
