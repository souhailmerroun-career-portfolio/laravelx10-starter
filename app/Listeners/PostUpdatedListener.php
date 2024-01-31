<?php

namespace App\Listeners;

use App\Events\PostUpdated as PostUpdatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\PostUpdated as PostUpdatedNotification;

class PostUpdatedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostUpdatedEvent $event): void
    {
        $user = $event->post->user;

        $user->notify(new PostUpdatedNotification($event->post));
    }
}
