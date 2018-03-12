<?php

namespace App\Http\Controllers;

use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StateController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::latest()->paginate();
        return view('state.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('state.new');
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
            'name' => 'required|min:2|max:2',
            'description' => 'required'
        ]);

        $state = new State;
        $state->name = $request->name;
        $state->description = $request->description;
        $state->save();

        return redirect()->back()->with('success', 'State has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\State  $State
     * @return \Illuminate\Http\Response
     */
    public function show(State $State)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\State  $State
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        $state = State::findOrFail($state->id);

        return view('state.edit', compact('state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\State  $State
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:2|max:2',
            'description' => 'required'
        ]);

        $state = State::find($id);
        $state->name = $request->name;
        $state->description = $request->description;
        $state->save();

        return redirect()->route('states.index')->with('success', 'State has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\State  $State
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {

        $state->delete();
        
        return redirect()->route('states.index')->with('danger', 'State has been Deleted');
    }
}
