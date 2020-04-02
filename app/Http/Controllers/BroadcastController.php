<?php

namespace App\Http\Controllers;

use App\Broadcast;
use Illuminate\Http\Request;

class BroadcastController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $broadcasts = Broadcast::latest('broadcast_on')
            ->where('message', 'like', "%{$request->search}%")
            ->where('lgu_id', auth()->user()->lgu_id)
            ->paginate(10);

        return view('broadcasts-list', ['broadcasts' => $broadcasts, 'search' => $request->search]);    
    }

    /**
     * Display the specified resource.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = null) 
    {
        $broadcasts = Broadcast::find($id);

        if(null != $id && (!$broadcasts || $broadcasts->lgu_id != auth()->user()->lgu_id)) {
            abort(404);
        }

        return view('broadcasts-show', ['broadcasts' => $broadcasts]);
    }

    /**
     * UpSave record
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $request->validate([
            'broadcast_on' => ['required', 'date',  'date_format:Y-m-d H:i:s'],
            'message' => ['required'],
        ]);

        $broadcasts = Broadcast::find($request->id);
        if (!$broadcasts || $broadcasts->lgu_id != auth()->user()->lgu_id) {
            $broadcasts = new Broadcast();
            $broadcasts->lgu_id = auth()->user()->lgu_id;
            $broadcasts->posted_by = auth()->user()->id;
        }

        $broadcasts->broadcast_on = $request->broadcast_on;
        $broadcasts->message = $request->message;
        $broadcasts->save();

        $request->session()->flash('status', 'Broadcast created and was put in queue for processing');

        return redirect('/broadcasts/' . $broadcasts->id);
    }

    public function delete($id)
    {
        $broadcasts = Broadcast::find($id);

        if (!$broadcasts || $broadcasts->lgu_id != auth()->user()->lgu_id) {
            return response('', 404);
        }
        
        $broadcasts->delete();

        return response()->json();
    }
}
