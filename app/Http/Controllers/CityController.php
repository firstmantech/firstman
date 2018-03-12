<?php

namespace App\Http\Controllers;

use App\City;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::latest()->paginate();
        return view('city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $state_id = State::pluck('description', 'id');
        return view('city.new', compact('state_id'));
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
            'state_id' => 'required',
            'name' => 'required',
            'description' => 'required'
        ]);

        $city = new City;
        $city->state_id = $request->state_id;
        $city->name = $request->name;
        $city->description = $request->description;
        $city->save();

        // flash('City has been added');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\city  $city
     * @return \Illuminate\Http\Response
     */
    public function show(city $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\city  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $state_id = State::pluck('description', 'id');

        $city = City::findOrFail($city->id);

        return view('city.edit', compact('city', 'state_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\city  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'state_id' => 'required',
            'name' => 'required',
            'description' => 'required'
        ]);

        $city = City::find($id);
        $city->state_id = $request->state_id;
        $city->name = $request->name;
        $city->description = $request->description;
        $city->save();

        // flash()->success('City has been updated.');

        return redirect()->route('cities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\city  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {

        $city->delete();

        flash()->success('City has been deleted.');

        return redirect()->route('cities.index');
    }
}
