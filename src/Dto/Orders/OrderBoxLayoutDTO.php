<?php

namespace Escorp\YmApiClient\Dto\Orders;


use Escorp\YmApiClient\Exceptions\DtoMappingException;

/**
 * Информация о коробке (для заказов в кабинете).
 */
class OrderBoxLayoutDTO {

    /**
     * Идентификатор грузового места в системе магазина.
     * @var string
     */
    public string $barcode;

    /**
     * Идентификатор коробки.
     * @var int
     */
    public int $boxId;

    /**
     * Список товаров в коробке.
     * @var array | OrderBoxLayoutItemDTO[]
     */
    public array $items;

    function __construct(string $barcode, int $boxId, array $items)
    {
        foreach ($items as $i) {
            if (!$i instanceof OrderBoxLayoutItemDTO) {
                throw new InvalidArgumentException('items must contain OrderBoxLayoutItemDTO');
            }
        }

        $this->barcode = $barcode;
        $this->boxId = $boxId;
        $this->items = $items;
    }

    /**
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        foreach (['barcode', 'boxId', 'items'] as $key) {
            if (!array_key_exists($key, $data)) {
                throw new DtoMappingException("OrderBoxLayoutDTO: missing field '{$key}'");
            }
        }

        $items = [];

        foreach ($data['items'] ?? [] as $item) {
            $items[] = OrderBoxLayoutItemDTO::fromArray($item);
        }

        return new self(
            $data['barcode'],
            (int)$data['boxId'],
            $items
        );
    }
}
