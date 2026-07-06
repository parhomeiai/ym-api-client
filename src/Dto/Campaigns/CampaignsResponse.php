<?php

namespace Escorp\YmApiClient\Dto\Campaigns;

use Escorp\YmApiClient\Dto\YmApiResponseDto;

use Escorp\YmApiClient\Dto\Pages\PagerDTO;
use Escorp\YmApiClient\Dto\Pages\PagingDTO;

/**
 * Ответ на запрос Список магазинов пользователя
 *
 * Используется в endpoint:
 * GET https://yandex.ru/dev/market/partner-api/doc/ru/reference/campaigns/getCampaigns
 */
class CampaignsResponse extends YmApiResponseDto
{
    /**
     *
     * @var array
     */
    public array $campaigns = [];

    /**
     *
     * @var PagerDTO|null
     */
    public ?PagerDTO $pager;

    /**
     *
     * @var PagingDTO|null
     */
    public ?PagingDTO $paging;

    public static function fromArray(array $response): self
    {
        $lemanaProApiResponseDto = parent::fromArray($response);

        $dto = new self($lemanaProApiResponseDto->data);

        $items = $response['campaigns'] ?? [];

        foreach ($items as $item) {
            $dto->campaigns[] = CampaignDTO::fromArray($item);
        }

        if(isset($response['pager'])){
            $dto->pager = PagerDTO::fromArray($response['pager']);
        }

        if(isset($response['paging'])){
            $dto->paging = PagingDTO::fromArray($response['paging']);
        }


        return $dto;
    }

    /**
     * Возвращает локации
     * @return LogisticLocationsDto[]
     */
    public function logisticLocations(): array
    {
        return $this->logisticLocations;
    }
}
