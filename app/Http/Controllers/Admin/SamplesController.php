<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Gate;

use App\Sample;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class SamplesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        if (! Gate::allows('sample_browse')) {
            return abort(401);
        }

        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $samples = Sample::where('title', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('date', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $samples = Sample::paginate($perPage);
        }

        return view('samples.index', compact('samples'));
    }

	
	
	public function data()
	{
		$samples = Sample::select(['id', 'title', 'email', 'created_at', 'updated_at']);

		return Datatables::of($samples)
			->addColumn('action', function ($sample) {
				return '<a href="samples/' . $sample->id . '/edit" class="btn btn-outline-primary"><i class="fa fa-star"></i> Edit</a>';
			})
			->editColumn('id', 'ID: {{$id}}')
			->make(true);
	}			


			
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {

			if (! Gate::allows('sample_read')) {
					return abort(401);
			}

			$sample = Sample::findOrFail($id);

			return view('samples.show', compact('sample'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {

        if (! Gate::allows('sample_edit')) {
            return abort(401);
        }

        $sample = Sample::findOrFail($id);

        return view('samples.edit', compact('sample'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        if (! Gate::allows('sample_add')) {
          return abort(401);
        }

        return view('samples.create');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {

        if (! Gate::allows('sample_delete')) {
          return abort(401);
        }

        Sample::destroy($id);

        return redirect('samples')->with('flash_message', 'Sample deleted!');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        if (! Gate::allows('sample_edit')) {
          return abort(401);
        }

        $this->validate($request, [
			    'title' => 'required'
        ]);

        $requestData = $request->all();
        
        Sample::create($requestData);

        return redirect('samples')->with('flash_message', 'Sample added!');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        if (! Gate::allows('sample_edit')) {
          return abort(401);
        }

        $this->validate($request, [
			    'title' => 'required'
        ]);
        
        $requestData = $request->all();
        
        $sample = Sample::findOrFail($id);
        $sample->update($requestData);

        return redirect('samples')->with('flash_message', 'Sample updated!');
    }


}
