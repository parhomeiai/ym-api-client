<?php

namespace Escorp\YmApiClient;

use Escorp\YmApiClient\Api\Common\PingApi;
use Escorp\YmApiClient\Api\Campaigns\CampaignsApi;
use Escorp\YmApiClient\Api\Products\CategoriesApi;
use Escorp\YmApiClient\Api\Orders\OrdersApi;

class YmApiClient
{
    public PingApi $ping;

    public CampaignsApi $campaignsApi;

    public CategoriesApi $categoriesApi;

    public OrdersApi $ordersApi;

    public function __construct(
            PingApi $ping,
            CampaignsApi $campaigns,
            CategoriesApi $categoriesApi,
            OrdersApi $ordersApi
    ) {
        $this->ping = $ping;

        $this->campaignsApi = $campaigns;

        $this->categoriesApi = $categoriesApi;

        $this->ordersApi = $ordersApi;
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

    /**
     * Данные о кабинетах и магазинах
     *
     * @return CampaignsApi
     */
    public function campaignsApi(): CampaignsApi
    {
        return $this->campaignsApi;
    }

    /**
     * Категории
     *
     * @return CategoriesApi
     */
    public function categoriesApi(): CategoriesApi
    {
        return $this->categoriesApi;
    }

    /**
     * Заказы
     *
     * @return OrdersApi
     */
    public function ordersApi(): OrdersApi
    {
        return $this->ordersApi;
    }
}