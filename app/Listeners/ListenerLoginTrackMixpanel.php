<?php

namespace App\Listeners;

use Mixpanel;

class ListenerLoginTrackMixpanel
{
    protected $mixpanel;

    public function __construct(Mixpanel $mixpanel)
    {
        $this->mixpanel = $mixpanel;
    }

    /**
     * Handle the event.
     */
    public function handle(object $event)
    {
        $user = $event->user;
        $this->mixpanel->identify($user->id);
        $this->mixpanel->track('User Logged In', ['distinct_id' => $user->id]);
    }
}