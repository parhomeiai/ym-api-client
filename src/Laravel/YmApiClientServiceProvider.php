<?php

namespace Escorp\YmApiClient\Laravel;

use Escorp\YmApiClient\YmApiClient;
use Escorp\YmApiClient\Factory\YmApiClientFactory;
use Illuminate\Support\ServiceProvider;

class YmApiClientServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/ym-api-client.php', 'ym-api-client'
        );

        $this->app->singleton(YmApiClient::class, function () {
            return YmApiClientFactory::make(
                config('ym-api-client.api_key'),
                [
                    'timeout'        => config('ym-api-client.http.timeout'),
                    'retry_times'    => config('ym-api-client.http.retry.times'),
                    'retry_sleep_ms' => config('ym-api-client.http.retry.sleep_ms'),
                ]
            );
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/ym-api-client.php' =>
                config_path('ym-api-client.php'),
        ], 'ym-api-client-config');
    }
}