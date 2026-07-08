<?php

namespace Escorp\YmApiClient\Dto\Campaigns;

use Escorp\YmApiClient\Dto\YmApiResponseDto;


/**
 * Ответ на запрос Настройки кабинета
 *
 * Используется в endpoint:
 * POST https://yandex.ru/dev/market/partner-api/doc/ru/reference/businesses/getBusinessSettings
 */
class SettingsResponse extends YmApiResponseDto
{
    /**
     *
     * @var string|null
     */
    public ?string $status;

    /**
     * Базовая информация о кабинете
     * @var BusinessDTO|null
     */
    public ?BusinessDTO $info;

    /**
     * Настройки на уровне кабинета.
     * @var SettingsDTO|null
     */
    public ?SettingsDTO $settings;

    /**
     * Уровень подписки кабинета
     * @var string|null
     */
    public ?string $subscriptionLevel;

    /**
     * Свойства кабинета
     * @var array
     */
    public array $traits = [];

    public static function fromArray(array $response): self
    {
        $ymApiResponseDto = parent::fromArray($response);

        $dto = new self($ymApiResponseDto->data);

        $dto->status = $response['status'] ?? null;

        if(isset($response['result']['info'])){
            $dto->info = BusinessDTO::fromArray($response['result']['info']);
        }

        if(isset($response['result']['settings'])){
            $dto->settings = SettingsDTO::fromArray($response['result']['settings']);
        }

        $dto->subscriptionLevel = $response['result']['subscriptionLevel'] ?? null;

        $dto->traits = $response['result']['traits'] ?? [];

        return $dto;
    }


}
