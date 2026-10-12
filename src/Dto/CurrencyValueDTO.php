<?php

namespace Escorp\YmApiClient\Dto;

use Escorp\YmApiClient\Exceptions\DtoMappingException;

/**
 * Валюта и ее значение.
 */
class CurrencyValueDTO {

    /**
     * Валюта
     * @var string
     */
    public string $currencyId;

    /**
     * Значение
     * @var float
     */
    public float $value;

    /**
     *
     * @param string $currencyId
     * @param float $value
     */
    function __construct(string $currencyId, float $value) {
        $this->currencyId = $currencyId;
        $this->value = $value;
    }

    /**
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        foreach (['currencyId', 'value'] as $key) {
            if (!array_key_exists($key, $data)) {
                throw new DtoMappingException("CurrencyValueDTO: missing field '{$key}'");
            }
        }

        return new self(
            $data['currencyId'],
            (float)$data['value'],
        );
    }
}
