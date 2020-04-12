<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessengerController extends Controller
{
    public function send(Request $request)
    {
        $appUser = \App\AppUser::where('device_id',$request->input('device_id'))->first();
        if (!$appUser) {
            return response()->json(['Invalid app user device'], 400); 
        }
        // validate that the message token is authentic
        $validationToken = $request->input('validation_token');
        $calculatedToken = hash_hmac('sha256', 
                                date('d') . '-' . 
                                $appUser->lgu_id . '-'. 
                                $request->input('device_id'), 
                            'singlecord');

        if ($validationToken != $calculatedToken) {
            return response()->json(['Invalid validation token', $validationToken, $calculatedToken], 400);
        }

        // save he message to table
        $msg = new \App\Message;
        $msg->device_id = $appUser->device_id;
        $msg->appuser_id = $appUser->id;
        $msg->lgu_id = $appUser->lgu_id;
        $msg->message = $request->input('message');
        $msg->save();

        return response()->json([]);
    }
}
