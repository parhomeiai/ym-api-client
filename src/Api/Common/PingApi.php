<?php

namespace Escorp\YmApiClient\Api\Common;

use Escorp\YmApiClient\Api\AbstractYmApi;


/**
 * Проверка подключения
 */
class PingApi extends AbstractYmApi
{
    /**
     * Проверка подключения
     * @return string
     */
    public function ping(): string
    {
        return "It's work";
    }
}
