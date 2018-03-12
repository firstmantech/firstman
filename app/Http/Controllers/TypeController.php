<?php

namespace App\Http\Controllers;

use App\Type;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::latest()->paginate();
        return view('type.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service_id = Service::pluck('description', 'id');   
        return view('type.new', compact('service_id'));
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
            'service_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'min_price' => 'required',
            'max_price' => 'required'
        ]);

        $type = new Type;
        $type->service_id = $request->service_id;
        $type->name = $request->name;
        $type->description = $request->description;
        $type->min_price = $request->min_price;
        $type->max_price = $request->max_price;
        $type->save();

        flash('Type has been added');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $Type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $Type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $Type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        $service_id = Service::pluck('description', 'id');

        $type = Type::findOrFail($type->id);

        return view('type.edit', compact('type', 'service_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $Type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $this->validate($request, [
            'service_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'min_price' => 'required',
            'max_price' => 'required'
        ]);

        $type = Type::find($type);
        $type->service_id = $request->service_id;
        $type->name = $request->name;
        $type->description = $request->description;
        $type->min_price = $request->min_price;
        $type->max_price = $request->max_price;
        $type->save();

        flash()->success('Type has been updated.');

        return redirect()->route('types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $Type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {

        $type->delete();

        flash()->success('Type has been deleted.');

        return redirect()->route('types.index');
    }
}
