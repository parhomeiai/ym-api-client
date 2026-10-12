<?php

namespace Escorp\YmApiClient\Dto\Orders;

use Escorp\YmApiClient\Exceptions\DtoMappingException;

/**
 * Количество единиц товара с определенным статусом.
 */
class OrderItemUnitStatusDTO {

    /**
     * Количество единиц товара.
     * @var int
     */
    public int $count;

    /**
     * Статус единицы товара в заказе.
     * @var string
     */
    public string $status;

    /**
     *
     * @param int $count
     * @param string $status
     */
    function __construct(int $count, string $status) {
        $this->count = $count;
        $this->status = $status;
    }

    /**
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        foreach (['count', 'status'] as $key) {
            if (!array_key_exists($key, $data)) {
                throw new DtoMappingException("OrderItemUnitStatusDTO: missing field '{$key}'");
            }
        }

        return new self(
            $data['count'],
            $data['status'],
        );
    }
}
