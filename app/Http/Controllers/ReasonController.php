<?php

namespace App\Http\Controllers;

use App\Reason;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReasonController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reasons = Reason::latest()->paginate();
        return view('reason.index', compact('reasons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reason.new');
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

        $reason = new Reason;
        $reason->name = $request->name;
        $reason->description = $request->description;
        $reason->save();

        // flash('Reason has been added');

        return redirect()->back()->with('success', 'Reason added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reason  $Reason
     * @return \Illuminate\Http\Response
     */
    public function show(Reason $Reason)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reason  $Reason
     * @return \Illuminate\Http\Response
     */
    public function edit(Reason $reason)
    {
        $reason = Reason::findOrFail($reason->id);

        return view('reason.edit', compact('reason'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reason  $Reason
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $reason = Reason::find($id);
        $reason->name = $request->name;
        $reason->description = $request->description;
        $reason->save();

        // flash()->success('Reason has been updated.');

        return redirect()->route('reasons.index')->with('success', 'Reason modified Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reason  $Reason
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reason $reason)
    {

        $reason->delete();

        // flash()->success('Reason has been deleted.');

        return redirect()->route('reasons.index')->with('success', 'Reason deleted Successfully');
    }
}
