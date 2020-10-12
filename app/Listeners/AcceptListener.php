<?php

namespace App\Listeners;

use App\Events\AcceptEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AcceptListener
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
     * @param  AcceptEvent  $event
     * @return void
     */
    public function handle(AcceptEvent $event)
    {
        $event->user->update([
            'is_active' => 1,
        ]);
    }
}
