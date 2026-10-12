<?php

namespace Escorp\YmApiClient\Dto\Orders;

use Escorp\YmApiClient\Exceptions\DtoMappingException;
use InvalidArgumentException;

/**
 * Информация о товаре в коробке.
 */
class OrderBoxLayoutItemDTO {

    /**
     * Идентификатор товара в заказе.
     * @var int
     */
    public int $id;

    /**
     * Количество единиц товара в коробке.
     * @var int|null
     */
    public ?int $fullCount;

    /**
     * Переданные коды маркировки.
     * @var array|null | OrderItemInstanceDTO[]
     */
    public ?array $instances;

    /**
     * Информация о части товара в коробке.
     * @var BoxLayoutPartialCountDTO|null
     */
    public ?BoxLayoutPartialCountDTO $partialCount;

    /**
     *
     * @param int $id
     * @param int|null $fullCount
     * @param array|null $instances
     * @param BoxLayoutPartialCountDTO|null $partialCount
     */
    function __construct(int $id, ?int $fullCount, ?array $instances, ?BoxLayoutPartialCountDTO $partialCount)
    {
        if($instances){
            foreach ($instances as $i) {
                if (!$i instanceof OrderItemInstanceDTO) {
                    throw new InvalidArgumentException('instances must contain OrderItemInstanceDTO');
                }
            }
        }

        $this->id = $id;
        $this->fullCount = $fullCount;
        $this->instances = $instances;
        $this->partialCount = $partialCount;
    }

            /**
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        foreach (['id'] as $key) {
            if (!array_key_exists($key, $data)) {
                throw new DtoMappingException("OrderBoxLayoutItemDTO: missing field '{$key}'");
            }
        }

        if(isset($data['instances'])){
            $instances = [];

            foreach ($data['instances'] ?? [] as $instance) {
                $instances[] = OrderItemInstanceDTO::fromArray($instance);
            }
        }

        return new self(
            $data['id'],
            $data['fullCount'] ?? null,
            $instances ?? null,
            isset($data['partialCount']) ? BoxLayoutPartialCountDTO::fromArray($data['partialCount']) : null
        );
    }
}
