<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

use App\Regions;
use App\LGU;
use App\Mail\AdminApplication;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // check if user is associated with any lgu.
        if ('no' == auth()->user()->allowed_lgu_admin) {
            return view('applyadmin', [
                'regions' => json_encode(\App\Regions::all()),
                'lgus' => json_encode(\App\LGU::all())
            ]);
        } else {
            return view('home');
        }
    }

    public function applyAdmin(Request $request)
    {

        $this->validate(
            $request,
            [
                'selectedRegionShortName' => 'required',
                'selectedLGU' => 'required',
                'applicantID' => 'required|file|mimes:pdf,jpeg,png|max:5120',
                'authorizationLetter' => 'required|file|mimes:pdf,jpeg,png|max:5120',
                'mayorID' => 'required|file|mimes:pdf,jpeg,png|max:5120',
            ],
            [
                'required' => ':attribute is required',
                'image' => ':attribute needs to be an image',
                'max' => ':attribute size is too big',
                'mimes' => ':attribute needs to be jpeg or png',
            ],
            [
                'selectedRegionShortName' => 'Region',
                'selectedLGU' => 'LGU',
                'applicantID' => 'ID',
                'authorizationLetter' => 'Authorization letter',
                'mayorID' => "Mayor's ID",
            ]
        );

        // save uploaded files storage
        $pathApplicantId = $request->file('applicantID')->store('', ['disk' => 'local-uploads']);
        $pathAuthorizationLetter = $request->file('authorizationLetter')->store('', ['disk' => 'local-uploads']);
        $pathMayorId = $request->file('mayorID')->store('', ['disk' => 'local-uploads']);

        $region = Regions::where('short_name', $request->input('selectedRegionShortName'))->first();
        $lgu = LGU::findOrFail($request->input('selectedLGU'));

        // update user lgu_id & allowed_lgu_admin
        $user = auth()->user();
        $user->lgu_id = $lgu->id;
        $user->allowed_lgu_admin = 'no';
        $user->save();

        // send email
        $data = [
            'email' => Auth()->user()->email,
            'name'  => Auth()->user()->name,
            'region' => $region->name,
            'lgu' => $lgu->name,
            'applicant_id' => $pathApplicantId,
            'authorization_letter' => $pathAuthorizationLetter,
            'mayor_id' => $pathMayorId,
        ];

        Mail::to('metroinfoph@gmail.com')->queue(new AdminApplication($data));

        // TODO: Call uploads folder clean up job

        $request->session()->flash('status', "Your application have been received and awaiting verification. You will receive an email once verified.");

        return redirect('home');
    }
}
