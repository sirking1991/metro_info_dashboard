<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use ClickSend\Configuration;
use ClickSend\Api\SMSApi;

class BroadcastMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * - Get all pending and broadcast_on is <= now()
     * - set status to 'Done'
     * - if broadcast_via = 'sms', send sms to all AppUser where lgu_id equals to the broadcast.lgu_id
     * - note to record sms sent to avoid duplication
     *
     * @return void
     */
    public function handle()
    {
        // Configure HTTP basic authorization: BasicAuth
        $config = \ClickSend\Configuration::getDefaultConfiguration()
            ->setUsername('sirking1991@gmail.com')
            ->setPassword('D7E564D5-9F4E-3719-E7D7-19214A866B0F');
        $apiInstance = new \ClickSend\Api\SMSApi(new \GuzzleHttp\Client(), $config);

        $messages = \App\Broadcast::where('status', 'pending')
            ->where('broadcast_on', '<=', date('Y-m-d H:i:s'))
            ->where('broadcast_via', 'sms')
            ->orderBy('created_at')
            ->get();

        $recipients = [];
        foreach ($messages as $msg) {       
            // get list of app_user who are susbscribed to the lgu and optin_sms='yes
            $appUsers = \App\AppUser::where('optin_sms', 'yes')->where('lgu_id', $msg->lgu_id)->get();
            foreach ($appUsers as $user) {
                $m = new \ClickSend\Model\SmsMessage();
                $m->setBody('METRO-INFO:'.$msg->message);
                $m->setTo($user->mobile);
                $m->setSource("sdk");    
                $recipients[] = $m;
            }

            $msg->status = 'done';
            $msg->save();
        }

        if (0 < count($recipients)) {
            // \ClickSend\Model\SmsMessageCollection | SmsMessageCollection model
            $sms_messages = new \ClickSend\Model\SmsMessageCollection();
            $sms_messages->setMessages($recipients);

            try {
                $result = $apiInstance->smsSendPost($sms_messages);
                print_r($result);
            } catch (\Exception $e) {
                echo 'Exception when calling SMSApi->smsSendPost: ', $e->getMessage(), PHP_EOL;
            }
        }
    }
}
