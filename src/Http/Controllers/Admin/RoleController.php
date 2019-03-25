<?php

namespace Iskandarali\Teras\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

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

    return view('teras::admin.role.index', compact('role'));
  }
}
