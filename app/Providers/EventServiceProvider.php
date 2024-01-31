<?php

namespace App\Providers;

use App\Events\PostCreated;
use App\Events\PostDeleted;
use App\Events\PostUpdated;
use App\Listeners\ListenerLoginTrackMixpanel;
use App\Listeners\PostCreatedListener;
use App\Listeners\PostDeletedListener;
use App\Listeners\PostUpdatedListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        Login::class => [
            ListenerLoginTrackMixpanel::class,
        ],
        PostCreated::class => [
            PostCreatedListener::class,
        ],
        PostUpdated::class => [
            PostUpdatedListener::class,
        ],
        PostDeleted::class => [
            PostDeletedListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
