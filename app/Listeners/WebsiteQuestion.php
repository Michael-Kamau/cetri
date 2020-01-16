<?php

namespace App\Listeners;

use App\Mail\RegisterMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;
use function GuzzleHttp\Psr7\str;

class WebsiteQuestion
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        try{
            Mail::to('test@test.com')->send(new RegisterMail($event->data));
            Log::info('New Email Successfully sent');
        }catch (\Exception $exception){
            Log::Error('Email failed to send');
            Log::Error('DATA SENT TO FAILED EMAIL: '.'Name=>'.$event->data['name'].' Question=>'.$event->data['question']);
        }


    }
}
