<?php

namespace Escorp\YmApiClient\Dto\Products;

/**
 * Ограничения на значения характеристик.
 */
class ParameterValueConstraintsDTO {

    /**
     * Максимальная длина текста.
     * @var int|null
     */
    public ?int $maxLength;

    /**
     * Максимальное число.
     * @var int|null
     */
    public ?int $maxValue;

    /**
     * Минимальное число.
     * @var int|null
     */
    public ?int $minValue;


    function __construct(?int $maxLength, ?int $maxValue, ?int $minValue) {
        $this->maxLength = $maxLength;
        $this->maxValue = $maxValue;
        $this->minValue = $minValue;
    }

        /**
     *
     * @param array $data
     * @return self
     * @throws DtoMappingException
     */
    public static function fromArray(array $data): self
    {
        return new self(
            isset($data['maxLength']) ? (int)$data['maxLength'] : null,
            isset($data['maxValue']) ? (int)$data['maxValue'] : null,
            isset($data['minValue']) ? (int)$data['minValue'] : null
        );
    }
}
