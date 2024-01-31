<?php

namespace App\Listeners;

use App\Events\PostDeleted as PostDeletedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\PostDeleted as PostDeletedNotification;

class PostDeletedListener
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
    public function handle(PostDeletedEvent $event): void
    {
        $user = $event->post->user;

        $user->notify(new PostDeletedNotification($event->post));
    }
}
