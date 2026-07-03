<?php

declare(strict_types=1);

namespace Escorp\YmApiClient\Factory;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\HttpFactory;
use Psr\Http\Client\ClientInterface;

use Escorp\YmApiClient\Api\Common\PingApi;

use Escorp\YmApiClient\Auth\StaticTokenProvider;
use Escorp\YmApiClient\Http\GuzzleHttpClient;
use Escorp\YmApiClient\Http\Psr18HttpClient;
use Escorp\YmApiClient\YmApiClient;

final class YmApiClientFactory
{
    /**
     * Создание клиента
     *
     * @param string $token YM API token
     * @param array{
     *   timeout?: int,
     *   retry_times?: int,
     *   retry_sleep_ms?: int
     * } $options
     */
    public static function make(string $token, array $options = [], ?ClientInterface $psr18Client = null): YmApiClient
    {
        $timeout = $options['timeout'] ?? 10;
        $retryTimes = $options['retry_times'] ?? 3;
        $retrySleepMs = $options['retry_sleep_ms'] ?? 300;

        if ($psr18Client === null) {
            // дефолтный Guzzle → PSR-18 адаптер
            $psr18Client = new GuzzleClient(['timeout' => $timeout]);
        }

        $http = new Psr18HttpClient(
            $psr18Client,
            new HttpFactory(),
            new HttpFactory()
        );

        //retry-обертка поверх PSR-18
        $guzzleHttpClient = new GuzzleHttpClient($http, $retryTimes, $retrySleepMs);

        // Token provider
        $tokenProvider = new StaticTokenProvider($token);

        //Domain API
        $pingApi = new PingApi($guzzleHttpClient, $tokenProvider);

        //Root client
        return new YmApiClient(
                    $pingApi
                );
    }
}

