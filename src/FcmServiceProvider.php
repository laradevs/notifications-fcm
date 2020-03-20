<?php

namespace LaraDevs\Fcm;

use Illuminate\Support\ServiceProvider;
use LaraDevs\Fcm\Fcm;

/**
 * Class FcmServiceProvider
 * @package LaraDevs\Fcm\Providers
 */
class FcmServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../resources/config/notification-fcm.php' => config_path('notification-fcm.php'),
        ]);
    }

    public function register()
    {
        $this->app->bind('fcm', function ($app) {
            return new Fcm(
                config('notification-fcm.server_key'),
                config('notification-fcm.server_endpoint')
            );
        });
    }
}
