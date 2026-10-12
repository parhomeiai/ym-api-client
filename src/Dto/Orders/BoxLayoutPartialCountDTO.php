<?php

namespace Escorp\YmApiClient\Dto\Orders;

use Escorp\YmApiClient\Exceptions\DtoMappingException;

/**
 * Информация о части товара в коробке.
 */
class BoxLayoutPartialCountDTO {

    /**
     * Номер части, начиная с 1.
     * @var int
     */
    public int $current;

    /**
     * На сколько всего частей разделен товар.
     * @var int
     */
    public int $total;

    /**
     *
     * @param int $current
     * @param int $total
     */
    function __construct(int $current, int $total) {
        $this->current = $current;
        $this->total = $total;
    }

    /**
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        foreach (['current', 'total'] as $key) {
            if (!array_key_exists($key, $data)) {
                throw new DtoMappingException("BoxLayoutPartialCountDTO: missing field '{$key}'");
            }
        }

        return new self(
            (int)$data['current'],
            (int)$data['total'],
        );
    }
}
