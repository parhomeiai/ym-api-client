<?php

namespace Escorp\YmApiClient\Api;

use Escorp\YmApiClient\Contracts\HttpClientInterface;
use Escorp\YmApiClient\Contracts\TokenProviderInterface;

/**
 * Базовый класс для всех Domain API
 *
 */
abstract class AbstractYmApi
{
    protected HttpClientInterface $http;
    protected TokenProviderInterface $token;

    protected string $baseUrl;

    public function __construct(
        HttpClientInterface $http,
        TokenProviderInterface $token,
        ?string $baseUrl = null)
    {
        $this->http = $http;
        $this->token = $token;

        $this->baseUrl = ($baseUrl) ? ($baseUrl) : ('https://api.partner.market.yandex.ru');
    }

    /**
     * Выполняет запрос, подставляет токен
     *
     * @param string $method
     * @param string $url
     * @param array $options
     * @return array
     */
    protected function request(string $method, string $url, array $options = []): array
    {
        if(!isset($options['headers']['Api-Key'])){
            $options['headers']['Api-Key'] = $this->token->getToken();
        }

        $response = $this->http->request($method, $url, $options);

        return $response;
    }
}
