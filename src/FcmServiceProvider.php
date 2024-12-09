<?php

namespace LaraDevs\Fcm;

use LaraDevs\Fcm\Fcm;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;

/**
 * Class FcmServiceProvider
 * @package LaraDevs\Fcm\Providers
 */
class FcmServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/config/notification-fcm.php' => config_path('notification-fcm.php'),
                __DIR__ . '/../resources/front/firebase-messaging-sw.js' => public_path('firebase-messaging-sw.js'),
            ]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('notification-fcm.php');
        }
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
