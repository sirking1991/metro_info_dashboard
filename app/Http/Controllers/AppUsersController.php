<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppUsersController extends Controller
{

    public function register(Request $request)
    {
        // $request->validate([
        //     'device_uuid' => 'required|min:10',
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'mobile' => 'required',
        //     'email' => 'required|email',
        //     'dob' => 'date_format:Y-m-d',
        // ]);

        // update if device_uuid already exist, otherwise create new record
        $appUser = \App\AppUser::firstOrNew(['device_id' => $request->input('device_id')]);
        $appUser->first_name = $request->input('first_name');
        $appUser->last_name = $request->input('last_name');
        $appUser->mobile = $request->input('mobile');
        $appUser->email = $request->input('email');
        $appUser->dob = $request->input('dob');
        $appUser->lgu_id = $request->input('lgu_id');
        $appUser->save();

        return response()->json([]);
    }
}
