<?php

namespace Escorp\YmApiClient\Dto\Campaigns;

/**
 * Информация о магазине.
 */
class CampaignDTO {

    /**
     * Возможность использовать API:
        AVAILABLE — методы API доступны для выполнения запросов.
        DISABLED_BY_INACTIVITY — методы API недоступны, так как магазин не размещал товары на витрине больше 90 дней.
        DISABLED_BY_NO_ACTIVE_CONTRACT — методы API недоступны из-за отсутствия активного договора с Маркетом.
        MANUALLY_DISABLED — методы API недоступны, так как интеграция выключена вручную.
        DISABLED_BY_NO_PLACEMENT_TYPE — методы API недоступны, так как магазин не подключен к программе размещения.
     * @var string|null
     */
    public ?string $apiAvailability;

    /**
     * Идентификатор плательщика в Яндекс Балансе.
     * @var int|null
     */
    public ?int $clientId;

    /**
     * Название магазина.
     * @var string|null
     */
    public ?string $domain;

    /**
     * Идентификатор кампании
     * @var int|null
     */
    public ?int $id;

    /**
     * Модель, по которой работает магазин:
        FBS — FBS или Экспресс.
        FBY — FBY.
        DBS — DBS.
        LAAS — LaaS.
     * @var string|null
     */
    public ?string $placementType;

    /**
     * Информация о кабинете.
     * @var BusinessDTO|null
     */
    public ?BusinessDTO $business;

    /**
     *
     * @param string|null $apiAvailability
     * @param int|null $clientId
     * @param string|null $domain
     * @param int|null $id
     * @param string|null $placementType
     * @param BusinessDTO|null $business
     */
    function __construct(?string $apiAvailability, ?int $clientId, ?string $domain, ?int $id, ?string $placementType, ?BusinessDTO $business)
    {
        $this->apiAvailability = $apiAvailability;
        $this->clientId = $clientId;
        $this->domain = $domain;
        $this->id = $id;
        $this->placementType = $placementType;
        $this->business = $business;
    }

    /**
     *
     * @param array $data
     * @return self
     * @throws DtoMappingException
     */
    public static function fromArray(array $data): self
    {
        $types = [];
        foreach ($data['types'] ?? [] as $type) {
            $types[] = NewsTypesDto::fromArray($type);
        }

        return new self(
            isset($data['apiAvailability']) ? (string)$data['apiAvailability'] : null,
            isset($data['clientId']) ? (string)$data['clientId'] : null,
            isset($data['domain']) ? (string)$data['domain'] : null,
            isset($data['id']) ? (int)$data['id'] : null,
            isset($data['placementType']) ? (string)$data['placementType'] : null,
            isset($data['business']) ? BusinessDTO::fromArray($data['business']) : null,
        );
    }
}
