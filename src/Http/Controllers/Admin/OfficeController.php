<?php

namespace Iskandarali\Teras\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Iskandarali\Teras\Model\Office;

class OfficeController extends Controller
{
    public function index()
    {
        $offices = Office::all();

        return view('teras::admin.office.index', compact('offices'));
    }

    public function create()
    {
        return view('teras::admin.office.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'        => 'required|unique:offices',
        ]);

        $office = Office::create($request->all());

        // flash('Office'. $office->name.' telah berjaya ditambah')->success();

        return redirect()->back();
    }
}
