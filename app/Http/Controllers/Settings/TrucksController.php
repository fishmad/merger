<?php

namespace App\Http\Controllers\Settings;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Truck;
use Illuminate\Http\Request;

class TrucksController extends Controller
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
            $trucks = Truck::where('name', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $trucks = Truck::paginate($perPage);
        }

        return view('settings.trucks.index', compact('trucks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('settings.trucks.create');
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
        
        Truck::create($requestData);

        return redirect('settings/trucks')->with('flash_message', 'Truck added!');
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
        $truck = Truck::findOrFail($id);

        return view('settings.trucks.show', compact('truck'));
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
        $truck = Truck::findOrFail($id);

        return view('settings.trucks.edit', compact('truck'));
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
        
        $truck = Truck::findOrFail($id);
        $truck->update($requestData);

        return redirect('settings/trucks')->with('flash_message', 'Truck updated!');
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
        Truck::destroy($id);

        return redirect('settings/trucks')->with('flash_message', 'Truck deleted!');
    }
}
