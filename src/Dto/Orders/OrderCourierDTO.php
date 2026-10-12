<?php

namespace Escorp\YmApiClient\Dto\Orders;

/**
 * Информация о курьере.
 */
class OrderCourierDTO {

    /**
     * Полное имя.
     * @var string|null
     */
    public ?string $fullName;

    /**
     * Номер телефона
     * @var string|null
     */
    public ?string $phone;

    /**
     * Добавочный номер телефона.
     * @var string|null
     */
    public ?string $phoneExtension;

    /**
     * Описание транспортного средства.
     * @var string|null
     */
    public ?string $vehicleDescription;

    /**
     * Номер транспортного средства
     * @var string|null
     */
    public ?string $vehicleNumber;

    /**
     *
     * @param string|null $fullName
     * @param string|null $phone
     * @param string|null $phoneExtension
     * @param string|null $vehicleDescription
     * @param string|null $vehicleNumber
     */
    function __construct(?string $fullName, ?string $phone, ?string $phoneExtension, ?string $vehicleDescription, ?string $vehicleNumber) {
        $this->fullName = $fullName;
        $this->phone = $phone;
        $this->phoneExtension = $phoneExtension;
        $this->vehicleDescription = $vehicleDescription;
        $this->vehicleNumber = $vehicleNumber;
    }

        /**
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['fullName'] ?? null,
            $data['phone'] ?? null,
            $data['phoneExtension'] ?? null,
            $data['vehicleDescription'] ?? null,
            $data['vehicleNumber'] ?? null,
        );
    }
}
