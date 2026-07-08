<?php

namespace Escorp\YmApiClient\Api\Campaigns;

use Escorp\YmApiClient\Api\AbstractYmApi;
use Escorp\YmApiClient\Dto\Campaigns\CampaignsResponse;
use Escorp\YmApiClient\Dto\Campaigns\CampaignDTO;
use Escorp\YmApiClient\Dto\Campaigns\SettingsResponse;
use Escorp\YmApiClient\Dto\Campaigns\CampaignSettingsResponse;

/**
 * Кабинеты и магазины
 */
class CampaignsApi extends AbstractYmApi
{

    /**
     * Метод позволяет получать Список магазинов пользователя
     *
     * @param int $limit
     * @param string $pageToken
     * @return CampaignsResponse
     */
    public function getCampaigns(int $limit = 100, string $pageToken = ''): CampaignsResponse
    {
        $url = $this->baseUrl . '/v2/campaigns';

        $response = $this->request('GET', $url);

        return CampaignsResponse::fromArray($response);
    }

    /**
     * Возвращает список магазинов пользователя
     *
     * @return array | \Escorp\YmApiClient\Dto\Campaigns\CampaignDTO[]
     */
    public function getCampaignsBatch(): array
    {
        $result = [];
        $nexPage = '';

        do{
            $campaignsResponse = $this->getCampaigns(100, $nexPage);

            foreach ($campaignsResponse->campaigns as $campaignDto) {
                $result[] = $campaignDto;
            }

            if($campaignsResponse->paging){
                $nexPage = $campaignsResponse->paging->nextPageToken;
            }
        }while($nexPage);

        return $result;
    }

    /**
     * Возвращает информацию о магазине.
     * @param int $campaignId
     * @return CampaignDTO
     */
    public function getCampaignById(int $campaignId): CampaignDTO
    {
        $url = $this->baseUrl . '/v2/campaigns/' . $campaignId;

        $response = $this->request('GET', $url);

        return CampaignDTO::fromArray($response);
    }

    /**
     * Информация о кабинете и его настройках.
     * @param int $businessId
     * @return SettingsResponse
     */
    public function businessSettings(int $businessId): SettingsResponse
    {
        $url = $this->baseUrl . '/v2/businesses/' . $businessId . '/settings';

        $response = $this->request('POST', $url);

        return SettingsResponse::fromArray($response);
    }

    /**
     * Настройки магазина
     * @param int $campaignId
     * @return CampaignSettingsResponse
     */
    public function campaignSettings(int $campaignId): CampaignSettingsResponse
    {
        $url = $this->baseUrl . '/v2/campaigns/' . $campaignId . '/settings';

        $response = $this->request('GET', $url);

        return CampaignSettingsResponse::fromArray($response);
    }
}
