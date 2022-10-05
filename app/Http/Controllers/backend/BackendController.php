<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BackendController extends Controller
{
    public function dashboard(){
        if (Auth::user()->role == 'user'){
            if ('http://localhost/project/BlogTest/public'==url('')){
                return redirect()->route('home');
            }
            return redirect()->back(url()->previous());
        }
        return view('layouts.backend.dashboard', [
            'check'  => Profile::where('user_id', Auth::user()->id)->first(),
        ]);
    }

    public function profile($id){
        $profile = Profile::find($id);
        $age = Carbon::now()->diffInYears($profile->age);
        $year = (new Carbon($profile->age))->addYears($age);

        return view('layouts.backend.profile.profile', [
            'self'  => $profile,
            'years' => $age,
            'days'  => Carbon::now()->diffInDays($year),
        ]);
    }


}
