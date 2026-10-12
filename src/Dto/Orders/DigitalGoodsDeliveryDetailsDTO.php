<?php

namespace Escorp\YmApiClient\Dto\Orders;

use Escorp\YmApiClient\Exceptions\DtoMappingException;

/**
 * Информация о доставке цифрового товара.
 */
class DigitalGoodsDeliveryDetailsDTO {

    /**
     * Тип цифрового товара.
     * @var string
     */
    public string $type;

    /**
     * Ссылка на Steam-аккаунт покупателя. Передается только для типа STEAM_GIFT
     * @var string|null
     */
    public ?string $steamLink;

    /**
     *
     * @param string $type
     * @param string|null $steamLink
     */
    function __construct(string $type, ?string $steamLink) {
        $this->type = $type;
        $this->steamLink = $steamLink;
    }

    /**
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        foreach (['type'] as $key) {
            if (!array_key_exists($key, $data)) {
                throw new DtoMappingException("DigitalGoodsDeliveryDetailsDTO: missing field '{$key}'");
            }
        }

        return new self(
            $data['type'],
            $data['steamLink'] ?? null
        );
    }
}
