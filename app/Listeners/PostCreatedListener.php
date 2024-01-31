<?php

namespace App\Listeners;

use App\Events\PostCreated as PostCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\PostCreated as PostCreatedNotification;

class PostCreatedListener
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
    public function handle(PostCreatedEvent $event): void
    {
        $user = $event->post->user;

        $user->notify(new PostCreatedNotification($event->post));
    }
}
