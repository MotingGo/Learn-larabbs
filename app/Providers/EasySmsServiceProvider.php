<?php

namespace App\Providers;

use App\Gateways\FeiGeSMSGateway;
use Illuminate\Support\ServiceProvider;
use Overtrue\EasySms\EasySms;

class EasySmsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(EasySms::class, function ($app) {

            $easySms = new EasySms(config('easysms'));

            $easySms->extend('feige', function ($gatewayConfig) {
                return new FeiGeSMSGateway($gatewayConfig);
            });

            return $easySms;
        });

        $this->app->alias(Easysms::class, 'easysms');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
