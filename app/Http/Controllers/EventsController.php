<?php

namespace App\Http\Controllers;

use App\Events;
use Illuminate\Http\Request;

class EventsController extends Controller
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
        $events = Events::oldest('event_from')
            ->where('name', 'like', "%{$request->search}%")
            ->where('lgu_id', auth()->user()->lgu_id)
            ->paginate(10);

        return view('events-list', ['events' => $events, 'search' => $request->search]);    
    }

    /**
     * Display the specified resource.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = null) 
    {
        $events = Events::find($id);

        if(null != $id && (!$events || $events->lgu_id != auth()->user()->lgu_id)) {
            abort(404);
        }

        return view('events-show', ['events' => $events]);
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
            'event_from' => ['required', 'date', 'date_format:Y-m-d H:i:s'],
            'event_to' => ['required', 'date', 'date_format:Y-m-d H:i:s'],
            'name' => ['required'],
        ]);

        $events = Events::find($request->id);
        if (!$events || $events->lgu_id != auth()->user()->lgu_id) {
            $events = new Events();
            $events->lgu_id = auth()->user()->lgu_id;
            $events->posted_by = auth()->user()->id;
        }

        $events->event_from = $request->event_from;
        $events->event_to = $request->event_to;
        $events->name = $request->name;
        $events->broadcast = $request->broadcast;
        $events->save();

        $request->session()->flash('status', 'Event saved');

        return redirect('/events/' . $events->id);
    }

    public function delete($id)
    {
        $events = Events::find($id);

        if (!$events || $events->lgu_id != auth()->user()->lgu_id) {
            return response('', 404);
        }
        
        $events->delete();

        return response()->json();
    }
}
