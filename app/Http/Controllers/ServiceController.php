<?php

namespace App\Http\Controllers;

use App\Service;
use App\Vertical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::latest()->paginate();
        return view('service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vertical_id = Vertical::pluck('description', 'id');
        return view('service.new', compact('vertical_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'vertical_id' => 'required',
            'name' => 'required',
            'description' => 'required'
        ]);

        $service = new Service;
        $service->vertical_id = $request->vertical_id;
        $service->name = $request->name;
        $service->description = $request->description;
        $service->min_price = $request->min_price;
        $service->max_price = $request->max_price;
        $service->save();

        // flash('Service has been added');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $Service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $service = Service::findOrFail($service->id);
        $vertical_id = Vertical::pluck('description', 'id');
        return view('service.edit', compact('service', 'vertical_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $this->validate($request, [
            'vertical_id' => 'required',
            'name' => 'required',
            'description' => 'required'
        ]);

        $service = Service::find($service);
        $service->vertical_id = $request->vertical_id;
        $service->name = $request->name;
        $service->description = $request->description;
        $service->min_price = $request->min_price;
        $service->max_price = $request->max_price;
        $service->save();

        // flash()->success('Service has been updated.');

        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {

        $service->delete();

        // flash()->success('Service has been deleted.');

        return redirect()->route('services.index');
    }
}
