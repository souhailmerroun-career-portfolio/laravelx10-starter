<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Mixpanel;

class MixpanelServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Mixpanel::class, function ($app) {
            return Mixpanel::getInstance(config('mixpanel.token'));
        });
    }
}