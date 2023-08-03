<?php

namespace Bytes4sale\PhoneNumberInfo;

use Bytes4sale\PhoneNumberInfo\Provider\HlrLookup;
use Illuminate\Support\ServiceProvider;

class PhoneNumberInfoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/phoneNumberInfo.php', 'phonenumberinfo');
        $this->app->singleton('numberinfo', function () {
            return new HlrLookup();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/phoneNumberInfo.php' => config_path('phonenumberinfo.php'),
        ], 'number-info-config');
    }
}
