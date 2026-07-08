<?php

namespace Escorp\YmApiClient\Dto\Campaigns;

/**
 * Информация о своем регионе магазина.
 */
class LocalRegionDTO {

    /**
     * Идентификатор региона.
     * @var int|null
     */
    public ?int $id;

    /**
     * Название региона.
     * @var string|null
     */
    public ?string $name;

    /**
     * Тип региона.
     * @var string|null
     */
    public ?string $type;

    /**
     * Источник информации о расписании работы службы доставки
     * @var string|null
     */
    public ?string $deliveryOptionsSource;

    /**
     * Информация о доставке в своем регионе магазина.
     * @var DeliveryDTO|null
     */
    public ?DeliveryDTO $delivery;

    function __construct(?int $id, ?string $name, ?string $type, ?string $deliveryOptionsSource, ?DeliveryDTO $delivery) {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->deliveryOptionsSource = $deliveryOptionsSource;
        $this->delivery = $delivery;
    }

        /**
     *
     * @param array $data
     * @return self
     * @throws DtoMappingException
     */
    public static function fromArray(array $data): self
    {
        return new self(
            isset($data['id']) ? (int)$data['id'] : null,
            isset($data['name']) ? (string)$data['name'] : null,
            isset($data['type']) ? (string)$data['type'] : null,
            isset($data['deliveryOptionsSource']) ? (string)$data['deliveryOptionsSource'] : null,
            isset($data['delivery']) ? DeliveryDTO::fromArray($data['delivery']) : null
        );
    }
}
