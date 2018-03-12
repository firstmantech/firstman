<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Department;
use App\Vertical;
use App\Service;
use App\Role;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = Department::pluck('description', 'id');
        $vertical = Vertical::pluck('description', 'id');
        $service = Service::pluck('description', 'id');

        return view('users.create', compact('department', 'vertical', 'service'));
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
            'email' => 'required|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'department' => 'required',
            'vertical' => 'required',
            'role' => 'required',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->department = $request->department;
        $user->vertical = $request->vertical;
        $user->services = $request->services;
        $user->role = $request->role;
        $user->save();

        // flash('Enquiry has been added');

        return redirect()->back()->with('success', 'New User Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $department = Department::pluck('description', 'id');
        $vertical = Vertical::pluck('description', 'id');
        $service = Service::pluck('description', 'id');

        return view('users.edit', compact('user', 'department', 'vertical', 'service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'department' => 'required',
            'vertical' => 'required',
            'role' => 'required',
        ]);

        $user = User::find($id);
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->name = $request->name;
        $user->department = $request->department;
        $user->vertical = $request->vertical;
        $user->services = $request->services;
        $user->role = $request->role;
        $user->save();

        // flash('Enquiry has been added');

        return redirect()->back()->with('success', 'User Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
