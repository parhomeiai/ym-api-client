<?php

namespace Escorp\YmApiClient;

use Escorp\YmApiClient\Api\Common\PingApi;

class YmApiClient
{
    public PingApi $ping;

    public function __construct(
            PingApi $ping
    ) {
        $this->ping = $ping;
    }

    public function ping(): string
    {
        return 'YM API client works';
    }

    /**
     * Возвращает объект для проверки подключения
     * @return PingApi
     */
    public function pingApi(): PingApi
    {
        return $this->ping;
    }
}