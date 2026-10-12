<?php

namespace Escorp\YmApiClient\Dto\Orders;

use Escorp\YmApiClient\Dto\RegionDTO;

/**
 * Информация о курьерской доставке.
 */
class OrderCourierDeliveryDTO {

    /**
     * Адрес доставки.
     * @var OrderDeliveryAddressDTO|null
     */
    public ?OrderDeliveryAddressDTO $address;

    /**
     * Регион доставки.
     * @var RegionDTO|null
     */
    public ?RegionDTO $region;

    /**
     *
     * @param OrderDeliveryAddressDTO|null $address
     * @param RegionDTO|null $region
     */
    function __construct(?OrderDeliveryAddressDTO $address, ?RegionDTO $region) {
        $this->address = $address;
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
            isset($data['region']) ? RegionDTO::fromArray($data['region']) : null
        );
    }
}
