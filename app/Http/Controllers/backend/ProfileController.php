<?php

namespace App\Http\Controllers\backend;

use App\helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Profile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function index()
    {
        if (Auth::user()->role == 'moderator'){
            return view('layouts.backend.profile.manage', [
                'profiles' => Profile::all(),
                'role'     => 'moderator',
            ]);
        }
        return view('layouts.backend.profile.manage', ['profiles' => Profile::all()]);
    }


    public function create()
    {
        return view('layouts.backend.profile.create', [
            'religion'   => ['Islam', 'Hindu', 'Christan', 'Buddha', 'Others'],
            'occupation' => ['Student', 'Teacher', 'Doctor', 'Web Developer', 'Engineer', 'Job Holder', 'Others'],
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'age'         => 'required',
            'whatsapp'    => 'required|max:11|min:11|regex:/(01)[0-9]{9}/',
            'address'     => 'required|max:191',
            'occupation'  => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
        ]);

        Profile::saveProfile($request);
        return redirect()->route('dashboard')->with('success', 'Data Added On Your Profile');
    }


    public function show($id)
    {
        Helper::changeStatus(Profile::find($id));
        return redirect()->back()->with('success', 'Status Changed Successfully');
    }


    public function edit($id)
    {
        return view('layouts.backend.profile.edit', [
            'profile'    => Profile::where('user_id', $id)->first(),
            'religion'   => ['Islam', 'Hindu', 'Christan', 'Buddha', 'Others'],
            'occupation' => ['Student', 'Teacher', 'Doctor', 'Web Developer', 'Engineer', 'Job Holder', 'Others'],
            'check'      => Profile::where('user_id', Auth::user()->id)->first(),
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'age'         => 'required',
            'whatsapp'    => 'required|regex:/(01)[0-9]{9}/',
            'address'     => 'required|max:191',
            'occupation'  => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
        ]);

        Profile::saveProfile($request, $id);
        return redirect()->route('dashboard')->with('success', 'Data Updated On Your Profile');
    }


    public function destroy($id)
    {
        Profile::find($id)->delete();
        return redirect()->back()->with('success', 'Profile Deleted Successfully');
    }
}
