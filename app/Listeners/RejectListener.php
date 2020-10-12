<?php

namespace App\Listeners;

use App\Events\RejectEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RejectListener
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
     * @param  RejectEvent  $event
     * @return void
     */
    public function handle(RejectEvent $event)
    {
        $event->user->update([
            'is_active'=>0,
        ]);
    }
}
