<?php

namespace App\Http\Controllers;

use App\Models\UsersRoles;
use App\Models\Role;
use Illuminate\Http\Request;

class UsersRolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usersRoles = UsersRoles::all();

        return view('users.index')
        ->with('usersRoles', $usersRoles)
        ->with('roles', Role::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create')
        ->with('roles', Role::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'email_address' => 'required|unique:users_roles,email_address|email',
            'role_id' => 'required',
            'nominated_password' => 'required|min:8|required_with:confirmed_password',
            'confirmed_password' => 'required|min:8|same:nominated_password',
        ]);

        UsersRoles::create([
            'full_name' => $request->full_name,
            'email_address' => $request->email_address,
            'role_id' => $request->role_id,
            'nominated_password' => $request->nominated_password,
            'confirmed_password' => $request->confirmed_password,
        ]);

        return redirect('usersroles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UsersRoles  $usersRoles
     * @return \Illuminate\Http\Response
     */
    public function show(UsersRoles $usersRoles)
    {
        return view('users.show')
        ->with('usersRoles', $usersRoles)
        ->with('roles', Role::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UsersRoles  $usersRoles
     * @return \Illuminate\Http\Response
     */
    public function edit(UsersRoles $usersRoles)
    {
        return view('users.edit')
        ->with('usersRoles', $usersRoles)
        ->with('roles', Role::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UsersRoles  $usersRoles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsersRoles $usersRoles)
    {
        $request->validate([
            'full_name' => 'required',
            'email_address' => 'required|unique:users_roles,email_address|email',
            'role_id' => 'required',
            'nominated_password' => 'required|min:8|required_with:confirmed_password',
            'confirmed_password' => 'required|min:8|same:nominated_password',
        ]);

        $usersRoles->update([
            'full_name' => $request->full_name,
            'email_address' => $request->email_address,
            'role_id' => $request->role_id,
            'nominated_password' => $request->nominated_password,
            'confirmed_password' => $request->confirmed_password,
        ]);

        return redirect('usersroles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsersRoles  $usersRoles
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsersRoles $usersRoles)
    {
        $usersRoles->delete();

        return redirect('usersroles');
    }
}
