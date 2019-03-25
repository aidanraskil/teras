<?php

namespace Iskandarali\Teras\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
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

  public function index()
  {
    $roles = Role::all();

    return view('teras::admin.role.index', compact('roles'));
  }

  public function edit($id)
  {
    $role = Role::findOrFail($id);

    $permissions = Permission::all();

    return view('teras::admin.role.edit', compact('role', 'permissions'));
  }

  public function update(Request $request, $id)
  {
    $role = Role::findOrFail($id);

    $this->validate($request, [
      'name'=>'required|max:50|unique:roles,name,'.$id,
      'permissions' =>'required',
    ]);

    $input = $request->except(['permissions']);

    $permissions = $request['permissions'];

    $role->fill($input)->save();

    $p_all = Permission::all();

    foreach ($p_all as $p) {
        $role->revokePermissionTo($p);
    }

    foreach ($permissions as $permission) {
        $p = Permission::where('id', '=', $permission)->firstOrFail();
        $role->givePermissionTo($p);
    }

    // flash('Peranan'. $role->name.' telah berjaya dikemaskini')->success();

    return redirect()->route('admin.role.index');
  }
}
