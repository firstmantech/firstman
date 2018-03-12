<?php

namespace App\Http\Controllers;

use App\Salutation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalutationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salutations = Salutation::latest()->paginate();
        return view('salutation.index', compact('salutations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salutation.new');
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

        $salutation = new Salutation;
        $salutation->name = $request->name;
        $salutation->description = $request->description;
        $salutation->save();

        // flash('Salutation has been added');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Salutation  $Salutation
     * @return \Illuminate\Http\Response
     */
    public function show(Salutation $Salutation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Salutation  $Salutation
     * @return \Illuminate\Http\Response
     */
    public function edit(Salutation $salutation)
    {
        $salutation = Salutation::findOrFail($salutation->id);

        return view('salutation.edit', compact('salutation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Salutation  $Salutation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $salutation = Salutation::find($id);
        $salutation->name = $request->name;
        $salutation->description = $request->description;
        $salutation->save();

        // flash()->success('Salutation has been updated.');

        return redirect()->route('salutations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Salutation  $Salutation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salutation $salutation)
    {

        $salutation->delete();

        // flash()->success('Salutation has been deleted.');

        return redirect()->route('salutations.index');
    }
}
