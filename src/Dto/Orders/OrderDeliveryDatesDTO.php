<?php

namespace Escorp\YmApiClient\Dto\Orders;


use Escorp\YmApiClient\Exceptions\DtoMappingException;

/**
 * Диапазон дат доставки.
 */
class OrderDeliveryDatesDTO {

    /**
     * Ближайшая дата доставки.
     * @var string
     */
    public string $fromDate;

    /**
     * Начало интервала времени доставки.
     * @var string|null
     */
    public ?string $fromTime;

    /**
     * Дата, когда товар доставлен до пункта выдачи заказа (в случае самовывоза) или до покупателя (если заказ доставляет курьер).
     * @var string|null
     */
    public ?string $realDeliveryDate;

    /**
     * Самая поздняя дата доставки.
     * @var string|null
     */
    public ?string $toDate;

    /**
     * Конец интервала времени доставки.
     * @var string|null
     */
    public ?string $toTime;


    /**
     *
     * @param string $fromDate
     * @param string|null $fromTime
     * @param string|null $realDeliveryDate
     * @param string|null $toDate
     * @param string|null $toTime
     */
    function __construct(string $fromDate, ?string $fromTime, ?string $realDeliveryDate, ?string $toDate, ?string $toTime) {
        $this->fromDate = $fromDate;
        $this->fromTime = $fromTime;
        $this->realDeliveryDate = $realDeliveryDate;
        $this->toDate = $toDate;
        $this->toTime = $toTime;
    }

    /**
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        foreach (['fromDate'] as $key) {
            if (!array_key_exists($key, $data)) {
                throw new DtoMappingException("OrderDeliveryDatesDTO: missing field '{$key}'");
            }
        }

        return new self(
            $data['fromDate'],
            $data['fromTime'] ?? null,
            $data['realDeliveryDate'] ?? null,
            $data['toDate'] ?? null,
            $data['toTime'] ?? null
        );
    }
}
