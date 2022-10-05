<?php

namespace App\Http\Controllers\backend;

use App\helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RoleController extends Controller
{

    public function index()
    {
        return view('layouts.backend.role.manage', ['roles' => Role::all()]);
    }


    public function create()
    {
        return view('layouts.backend.role.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles|max:191'
        ]);
        Role::saveRole($request);
        return redirect()->back()->with('success', 'Role Uploaded Successfully');
    }


    public function show($id)
    {
        Helper::changeStatus(Role::find($id));
        return \redirect()->back()->with('success', 'Role Status Changed');
    }


    public function edit($id)
    {
        return view('layouts.backend.role.edit', ['role' => Role::find($id)]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:roles|max:191'
        ]);
        Role::saveRole($request, $id);
        return redirect()->route('roles.index')->with('success', 'Role Updated Successfully');
    }


    public function destroy($id)
    {
        Role::find($id)->delete();
        return redirect()->back()->with('success', 'Role Deleted Successfully');
    }
}
