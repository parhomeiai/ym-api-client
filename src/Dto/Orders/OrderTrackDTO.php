<?php

namespace Escorp\YmApiClient\Dto\Orders;

use Escorp\YmApiClient\Exceptions\DtoMappingException;

/**
 * Информация о трек-номере посылки (DBS).
 */
class OrderTrackDTO {

    /**
     * Идентификатор службы доставки
     * @var int
     */
    public int $deliveryServiceId;

    /**
     * Трек‑номер посылки.
     * @var string|null
     */
    public ?string $trackCode;

    /**
     *
     * @param int $deliveryServiceId
     * @param string|null $trackCode
     */
    function __construct(int $deliveryServiceId, ?string $trackCode) {
        $this->deliveryServiceId = $deliveryServiceId;
        $this->trackCode = $trackCode;
    }

    /**
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        foreach (['deliveryServiceId'] as $key) {
            if (!array_key_exists($key, $data)) {
                throw new DtoMappingException("OrderTrackDTO: missing field '{$key}'");
            }
        }

        return new self(
            (int)$data['deliveryServiceId'],
            $data['trackCode'] ?? null,
        );
    }
}
