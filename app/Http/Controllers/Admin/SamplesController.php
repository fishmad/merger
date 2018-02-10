<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Gate;
use DB;
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

      // $this->authorize('sample_browse', $request);
        if (! Gate::allows('sample_browse')) {
            //return abort(401);
            return redirect()->guest('login');
        }

        $dbFields = DB::getSchemaBuilder()->getColumnListing('samples');

        return view('settings.samples.index', compact('dbFields'));
    }


  public function datatables()
  {
    // $samples = Sample::select(['id', 'title', 'email', 'description', 'updated_at']);
    $samples = Sample::all();

    return Datatables::of($samples)
      ->addColumn('action', function ($sample) {

          $btns    = '<a href="/settings/samples/' . $sample->id . '" title="View" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-search-plus"></i></a> ';
          $btns   .= '<a href="/settings/samples/' . $sample->id . '/edit" title="Edit" class="btn btn-success btn-sm"><i class="fa fa-fw fa-edit"></i></a> ';
          $btns   .= '<button class="btn btn-danger btn-sm btn-delete" data-remote="/settings/samples/' . $sample->id . '"><i class="fa fa-fw fa-trash-o" aria-hidden="true"></i>';

        return $btns;
    })
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

      // if (! Gate::allows('sample_read')) {
      //    return abort(401);
      // }

      $sample = Sample::findOrFail($id);

      return view('settings.samples.show', compact('sample'));
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

        return view('settings.samples.edit', compact('sample'));
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

        return view('settings.samples.create');
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

        return redirect('settings/samples')->with('flash_message', 'Sample deleted!');
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

        return redirect('settings/samples')->with('flash_message', 'Sample added!');
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

        return redirect('settings/samples')->with('flash_message', 'Sample updated!');
    }


}
