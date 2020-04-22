<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LGUController extends Controller
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


    public function appSettings(){
        $lgu = \App\LGU::find( Auth()->user()->lgu_id );

        return view('app-settings', ['lgu' => $lgu]);
    }

    public function saveAppSettings(Request $request){
        
        $lgu = \App\LGU::find( Auth()->user()->lgu_id );

        if(null == $lgu) {
            abort(404);
        }

        $lgu->color = $request->input('color');
        $lgu->about = $request->input('about');
        $lgu->update();

        $request->session()->flash('status', 'App settings saved');

        return redirect('/app-settings');

    }
}
