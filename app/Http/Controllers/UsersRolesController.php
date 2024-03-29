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
        ->with('usersRoles', $usersRoles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roleExists = Role::where('id', '>', 0)->exists();

        if($roleExists) {
            return view('users.create')
            ->with('roles', Role::all());
        }
        else {
            return redirect()->back()->with('error', 'There are no roles, please create a role first');
        }
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

        return redirect('usersroles')->with('success', "User: $request->full_name created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UsersRoles  $usersRoles
     * @return \Illuminate\Http\Response
     */
    public function show($usersRoles)
    {
        $findUser = UsersRoles::find($usersRoles);

        return view('users.show')
        ->with('usersRoles', $findUser);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UsersRoles  $usersRoles
     * @return \Illuminate\Http\Response
     */
    public function edit($usersRoles)
    {
        $findUser = UsersRoles::find($usersRoles);

        return view('users.edit')
        ->with('usersRoles', $findUser)
        ->with('roles', Role::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UsersRoles  $usersRoles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $usersRoles)
    {
        $request->validate([
            'full_name' => 'required',
            'email_address' => 'required|email',
            'role_id' => 'required',
            'nominated_password' => 'required|min:8|required_with:confirmed_password',
            'confirmed_password' => 'required|min:8|same:nominated_password',
        ]);

        $findUser = UsersRoles::find($usersRoles);

        $findUser->update([
            'full_name' => $request->full_name,
            'email_address' => $request->email_address,
            'role_id' => $request->role_id,
            'nominated_password' => $request->nominated_password,
            'confirmed_password' => $request->confirmed_password,
        ]);

        return redirect('usersroles')->with('success', "User: $request->full_name updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsersRoles  $usersRoles
     * @return \Illuminate\Http\Response
     */
    public function destroy($usersRoles)
    {
        $findUser = UsersRoles::find($usersRoles);

        $findUser->delete();

        return redirect('usersroles')->with('warning', "User deleted");
    }
}
