<?php

namespace App\Http\Controllers\Settings;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Plant;
use Illuminate\Http\Request;

class PlantsController extends Controller
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
            $plants = Plant::where('name', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $plants = Plant::paginate($perPage);
        }

        return view('setting.plants.index', compact('plants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('setting.plants.create');
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
        
        Plant::create($requestData);

        return redirect('settings/plants')->with('flash_message', 'Plant added!');
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
        $plant = Plant::findOrFail($id);

        return view('setting.plants.show', compact('plant'));
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
        $plant = Plant::findOrFail($id);

        return view('setting.plants.edit', compact('plant'));
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
        
        $plant = Plant::findOrFail($id);
        $plant->update($requestData);

        return redirect('settings/plants')->with('flash_message', 'Plant updated!');
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
        Plant::destroy($id);

        return redirect('settings/plants')->with('flash_message', 'Plant deleted!');
    }
}
