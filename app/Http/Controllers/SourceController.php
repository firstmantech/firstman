<?php

namespace App\Http\Controllers;

use App\Source;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SourceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sources = Source::latest()->paginate();
        return view('source.index', compact('sources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('source.new');
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
            'name' => 'required',
            'description' => 'required'
        ]);

        $source = new Source;
        $source->name = $request->name;
        $source->description = $request->description;
        $source->save();

        // flash('Source has been added');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Source  $Source
     * @return \Illuminate\Http\Response
     */
    public function show(Source $Source)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Source  $Source
     * @return \Illuminate\Http\Response
     */
    public function edit(Source $source)
    {
        $source = Source::findOrFail($source->id);

        return view('source.edit', compact('source'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Source  $Source
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $source = Source::find($id);
        $source->name = $request->name;
        $source->description = $request->description;
        $source->save();

        // flash()->success('Source has been updated.');

        return redirect()->route('sources.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Source  $Source
     * @return \Illuminate\Http\Response
     */
    public function destroy(Source $source)
    {

        $source->delete();

        // flash()->success('Source has been deleted.');

        return redirect()->route('sources.index');
    }
}
