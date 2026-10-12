<?php

namespace Escorp\YmApiClient\Dto\Orders;

use Escorp\YmApiClient\Dto\Orders\PriceDTO;

use Escorp\YmApiClient\Exceptions\DtoMappingException;
use InvalidArgumentException;

/**
 * Товар в заказе
 */
class OrderItemDTO {

    /**
     * Идентификатор товара в заказе.
     * @var int
     */
    public int $id;

    /**
     * Количество единиц товара.
     * @var int
     */
    public int $count;

    /**
     * Ваш SKU — идентификатор товара в вашей системе.
     * @var string
     */
    public string $offerId;

    /**
     * Название товара.
     * @var string
     */
    public string $offerName;

    /**
     * Информация о маркировке единиц товара.
     * @var array|null | OrderItemInstanceDTO[]
     */
    public ?array $instances;

    /**
     *
     * @var array|null | OrderItemUnitStatusDTO[]
     */
    public ?array $itemStatuses;

    /**
     * Информация о выплатах и вознаграждениях.
     * @var PriceDTO|null
     */
    public ?PriceDTO $prices;

    /**
     * Список необходимых маркировок товара.
     * @var array|null | string[]
     */
    public ?array $requiredInstanceTypes;

    /**
     * Признаки товара.
     * @var array|null | string[]
     */
    public ?array $tags;

    function __construct(int $id, int $count, string $offerId, string $offerName, ?array $instances, ?array $itemStatuses, ?PriceDTO $prices, ?array $requiredInstanceTypes, ?array $tags) {

        if($instances){
            foreach ($instances as $i) {
                if (!$i instanceof OrderItemInstanceDTO) {
                    throw new InvalidArgumentException('instances must contain OrderItemInstanceDTO');
                }
            }
        }
        if($itemStatuses){
            foreach ($itemStatuses as $i) {
                if (!$i instanceof OrderItemUnitStatusDTO) {
                    throw new InvalidArgumentException('itemStatuses must contain OrderItemUnitStatusDTO');
                }
            }
        }

        $this->id = $id;
        $this->count = $count;
        $this->offerId = $offerId;
        $this->offerName = $offerName;
        $this->instances = $instances;
        $this->itemStatuses = $itemStatuses;
        $this->prices = $prices;
        $this->requiredInstanceTypes = $requiredInstanceTypes;
        $this->tags = $tags;
    }

    /**
     *
     * @param array $data
     * @return self
     * @throws DtoMappingException
     */
    public static function fromArray(array $data): self
    {
        foreach (['id', 'count', 'offerId', 'offerName'] as $key) {
            if (!array_key_exists($key, $data)) {
                throw new DtoMappingException("OrderItemDTO: missing field '{$key}'");
            }
        }

        if(isset($data['instances'])){
            $instances = [];

            foreach ($data['instances'] ?? [] as $instance) {
                $instances[] = OrderItemInstanceDTO::fromArray($instance);
            }
        }

        if(isset($data['itemStatuses'])){
            $itemStatuses = [];

            foreach ($data['itemStatuses'] ?? [] as $itemStatuse) {
                $itemStatuses[] = OrderItemUnitStatusDTO::fromArray($itemStatuse);
            }
        }

        return new self(
            $data['id'],
            $data['count'],
            $data['offerId'],
            $data['offerName'],
            $instances ?? null,
            $itemStatuses ?? null,
            isset($data['prices']) ? PriceDTO::fromArray($data['prices']) : null,
            $data['requiredInstanceTypes'] ?? null,
            $data['tags'] ?? null
        );
    }
}
