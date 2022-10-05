<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class manageUserController extends Controller
{

    public function index()
    {
        return view('layouts.backend.user.manage', [ 'users' => User::all() ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return view('layouts.backend.user.edit', [
            'user'  => User::find($id),
            'roles' => Role::all(),
        ]);
    }


    public function update(Request $request, $id)
    {
        User::where('id', $id)->update(['role' => $request->user_role]);
        return redirect()->route('manageUsers.index')->with('success', 'Role Updated Successfully');
    }


    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->back()->with('success', 'User Deleted Successfully');
    }
}
