<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Frog;
use Illuminate\Http\Request;

class FrogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $frogs = Frog::where('name', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $frogs = Frog::paginate($perPage);
        }

        return view('admin.frogs.index', compact('frogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.frogs.create');
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
        
        $requestData = $request->all();
        
        Frog::create($requestData);

        return redirect('admin/frogs')->with('flash_message', 'Frog added!');
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
        $frog = Frog::findOrFail($id);

        return view('admin.frogs.show', compact('frog'));
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
        $frog = Frog::findOrFail($id);

        return view('admin.frogs.edit', compact('frog'));
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
        
        $requestData = $request->all();
        
        $frog = Frog::findOrFail($id);
        $frog->update($requestData);

        return redirect('admin/frogs')->with('flash_message', 'Frog updated!');
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
        Frog::destroy($id);

        return redirect('admin/frogs')->with('flash_message', 'Frog deleted!');
    }
}
