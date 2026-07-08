<?php

namespace Escorp\YmApiClient\Dto\Campaigns;

use Escorp\YmApiClient\Dto\YmApiResponseDto;



/**
 * Ответ на запрос Настройки магазина
 *
 * Используется в endpoint:
 * GET https://yandex.ru/dev/market/partner-api/doc/ru/reference/campaigns/getCampaignSettings#entity-CampaignSettingsScheduleDTO
 */
class CampaignSettingsResponse extends YmApiResponseDto
{
    /**
     * Настройки магазина.
     * @var CampaignSettingsDTO|null
     */
    public ?CampaignSettingsDTO $settings;


    public static function fromArray(array $response): self
    {
        $ymApiResponseDto = parent::fromArray($response);

        $dto = new self($ymApiResponseDto->data);

        if(isset($response['settings'])){
            $dto->settings = CampaignSettingsDTO::fromArray($response['settings']);
        }

        return $dto;
    }

    /**
     * Настройки магазина.
     * @return CampaignSettingsDTO|null
     */
    public function settings(): ?CampaignSettingsDTO
    {
        return $this->settings;
    }
}
