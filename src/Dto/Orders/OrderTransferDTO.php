<?php

namespace Escorp\YmApiClient\Dto\Orders;

/**
 * Информация о курьере и код подтверждения.
 */
class OrderTransferDTO {

    /**
     * Информация о курьере.
     * @var OrderCourierDTO|null
     */
    public ?OrderCourierDTO $courier;

    /**
     * Информация о коде подтверждения.
     * @var OrderEacDTO|null
     */
    public ?OrderEacDTO $eac;

    /**
     *
     * @param OrderCourierDTO|null $courier
     * @param OrderEacDTO|null $eac
     */
    function __construct(?OrderCourierDTO $courier, ?OrderEacDTO $eac) {
        $this->courier = $courier;
        $this->eac = $eac;
    }

        /**
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            isset($data['courier']) ? OrderCourierDTO::fromArray($data['courier']) : null,
            isset($data['eac']) ? OrderEacDTO::fromArray($data['eac']) : null
        );
    }
}
