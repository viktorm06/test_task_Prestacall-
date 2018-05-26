<?php

namespace App\Listeners;

use App\Events\UserChanged;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class WriteUserToLog
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
     * @param  UserChanged  $event
     * @return void
     */
    public function handle(UserChanged $event)
    {
        Log::info("Changed the user \nid: ". $event->user->id . "\nname: " . $event->user->name . "\nemail: " . $event->user->email);
    }
}
