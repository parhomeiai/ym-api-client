<?php

namespace Escorp\YmApiClient\Dto\Orders;

use Escorp\YmApiClient\Exceptions\DtoMappingException;

/**
 * Информация об отгрузке заказа.
 */
class OrderShipmentDTO {

    /**
     * Дата отгрузки.
     * @var string
     */
    public string $shipmentDate;

    /**
     * Идентификатор отгрузки
     * @var int|null
     */
    public ?int $id;

    /**
     * Время отгрузки.
     * @var string|null
     */
    public ?string $shipmentTime;

    /**
     *
     * @param string $shipmentDate
     * @param int|null $id
     * @param string|null $shipmentTime
     */
    function __construct(string $shipmentDate, ?int $id, ?string $shipmentTime) {
        $this->shipmentDate = $shipmentDate;
        $this->id = $id;
        $this->shipmentTime = $shipmentTime;
    }

        /**
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        foreach (['shipmentDate'] as $key) {
            if (!array_key_exists($key, $data)) {
                throw new DtoMappingException("OrderShipmentDTO: missing field '{$key}'");
            }
        }

        return new self(
            $data['shipmentDate'],
            isset($data['id']) ? (int)$data['id'] : null,
            $data['shipmentTime'] ?? null,
        );
    }
}
