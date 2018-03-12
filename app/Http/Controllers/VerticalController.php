<?php

namespace App\Http\Controllers;

use App\Vertical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerticalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $verticals = Vertical::latest()->paginate();
        return view('vertical.index', compact('verticals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vertical.new');
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

        $vertical = new Vertical;
        $vertical->name = $request->name;
        $vertical->description = $request->description;
        $vertical->save();

        // flash('Vertical has been added');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vertical  $Vertical
     * @return \Illuminate\Http\Response
     */
    public function show(Vertical $Vertical)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vertical  $Vertical
     * @return \Illuminate\Http\Response
     */
    public function edit(Vertical $vertical)
    {
        $vertical = Vertical::findOrFail($vertical->id);

        return view('vertical.edit', compact('vertical'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vertical  $Vertical
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $vertical = Vertical::find($id);
        $vertical->name = $request->name;
        $vertical->description = $request->description;
        $vertical->save();

        // flash()->success('Vertical has been updated.');

        return redirect()->route('verticals.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vertical  $Vertical
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vertical $vertical)
    {

        $vertical->delete();

        // flash()->success('Vertical has been deleted.');

        return redirect()->route('verticals.index');
    }
}
