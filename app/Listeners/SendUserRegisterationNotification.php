<?php

namespace App\Listeners;

use App\Events\UserRegisteration;
use App\Mail\UserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendUserRegisterationNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        info('handle');
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserRegisteration  $event
     * @return void
     */
    public function handle(UserRegisteration $event)
    {
        info('handle: ' . $event->user->email);
        Mail::send(new UserRegistered($event->user));
    }
}
