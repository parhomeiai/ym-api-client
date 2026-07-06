<?php

namespace Escorp\YmApiClient;

use Escorp\YmApiClient\Api\Common\PingApi;
use Escorp\YmApiClient\Api\Campaigns\CampaignsApi;

class YmApiClient
{
    public PingApi $ping;

    public CampaignsApi $campaignsApi;

    public function __construct(
            PingApi $ping,
            CampaignsApi $campaigns
    ) {
        $this->ping = $ping;

        $this->campaignsApi = $campaigns;
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
}