<?php

namespace Iskandarali\Teras\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * [index description].
     *
     * @return [type] [description]
     */
    public function index()
    {
        $users = User::all();

        return view('teras::admin.user.index', compact('users'));
    }

    public function create()
    {
        // code...
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        $roles = Role::get();

        $permissions = Permission::get();

        return view('teras::admin.user.edit', compact('user', 'roles', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->password == '') {
            $input = $request->except('password'); //Retreive the name, email and password fields
        } else {
            $input = $request->all(); //Retreive the name, email and password fields
        }
        $roles = $request['roles']; //Retreive all roles
        $permissions = $request['permissions']; //Retreive all roles
        $user->fill($input)->save();

        if (isset($roles)) {
            $user->roles()->sync($roles);  //If one or more role is selected associate user to roles
        } else {
            $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
        }

        if (isset($permissions)) {
            $user->permissions()->sync($permissions);  //If one or more role is selected associate user to roles
        } else {
            $user->permissions()->detach(); //If no role is selected remove exisiting role associated to a user
        }

        // flash("Gred ".$request->name." telah berjaya dikemaskini.")->success();

        return redirect()->route('admin.user.index');
    }
}
