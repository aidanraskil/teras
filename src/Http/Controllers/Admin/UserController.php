<?php

namespace Iskandarali\Teras\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
     * [index description]
     * @return [type] [description]
     */
	public function index()
	{
		return view('teras::admin.dashboard');
	}
}