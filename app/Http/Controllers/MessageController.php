<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
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
        $messages = Message::latest('created_at')
            ->where('message', 'like', "%{$request->search}%")
            ->where('lgu_id', auth()->user()->lgu_id)
            ->paginate(10);

        return view('messages-list', ['messages' => $messages, 'search' => $request->search]);    
    }

    public function markRead($id)
    {
        $message = Message::find($id);

        if (!$message || $message->lgu_id != auth()->user()->lgu_id) {
            return response('', 404);
        }
        
        $message->read_on = now();
        $message->read_by = auth()->user()->id;
        $message->save();

        return response()->json();
    }
}
