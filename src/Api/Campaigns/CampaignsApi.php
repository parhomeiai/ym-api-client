<?php

namespace Escorp\YmApiClient\Api\Campaigns;

use Escorp\YmApiClient\Api\AbstractYmApi;
use Escorp\YmApiClient\Dto\Campaigns\CampaignsResponse;

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
}
