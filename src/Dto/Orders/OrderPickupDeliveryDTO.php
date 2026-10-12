<?php

namespace Escorp\YmApiClient\Dto\Orders;

use Escorp\YmApiClient\Dto\RegionDTO;

/**
 * Информация о доставке в пункт выдачи.
 */
class OrderPickupDeliveryDTO {

    /**
     * Адрес доставки.
     * @var OrderDeliveryAddressDTO|null
     */
    public ?OrderDeliveryAddressDTO $address;

    /**
     * Идентификатор пункта выдачи.
     * @var int|null
     */
    public ?int $logisticPointId;

    /**
     * Идентификатор пункта самовывоза, присвоенный магазином.
     * @var string|null
     */
    public ?string $outletCode;

    /**
     * Дата, до которой заказ будет храниться в пункте выдачи. Возвращается, когда заказ переходит в статус PICKUP
     * @var string|null
     */
    public ?string $outletStorageLimitDate;

    /**
     * Регион доставки.
     * @var RegionDTO|null
     */
    public ?RegionDTO $region;

    /**
     *
     * @param OrderDeliveryAddressDTO|null $address
     * @param int|null $logisticPointId
     * @param string|null $outletCode
     * @param string|null $outletStorageLimitDate
     * @param RegionDTO|null $region
     */
    function __construct(?OrderDeliveryAddressDTO $address, ?int $logisticPointId, ?string $outletCode, ?string $outletStorageLimitDate, ?RegionDTO $region) {
        $this->address = $address;
        $this->logisticPointId = $logisticPointId;
        $this->outletCode = $outletCode;
        $this->outletStorageLimitDate = $outletStorageLimitDate;
        $this->region = $region;
    }

        /**
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {

        return new self(
            isset($data['address']) ? OrderDeliveryAddressDTO::fromArray($data['address']) : null,
            isset($data['logisticPointId']) ? (int)$data['logisticPointId'] : null,
            $data['outletCode'] ?? null,
            $data['outletStorageLimitDate'] ?? null,
            isset($data['region']) ? RegionDTO::fromArray($data['region']) : null
        );
    }
}
