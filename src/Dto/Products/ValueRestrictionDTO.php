<?php

namespace Escorp\YmApiClient\Dto\Products;

/**
 * Ограничение на возможные значения, накладываемое другой характеристикой.
 */
class ValueRestrictionDTO {

    /**
     * Идентификатор ограничивающей характеристики.
     * @var int|null
     */
    public ?int $limitingParameterId;

    /**
     * Значения ограничивающей характеристики и соответствующие допустимые значения текущей характеристики.
     * @var array | OptionValuesLimitedDTO[]
     */
    public array $limitedValues = [];

    /**
     *
     * @param int|null $limitingParameterId
     * @param array $limitedValues
     */
    function __construct(?int $limitingParameterId, array $limitedValues) {
        $this->limitingParameterId = $limitingParameterId;
        $this->limitedValues = $limitedValues;
    }

        /**
     *
     * @param array $data
     * @return self
     * @throws DtoMappingException
     */
    public static function fromArray(array $data): self
    {
        $limitedValues = [];

        foreach($data['limitedValues'] ?? [] as $limitedValues){
            $limitedValues[] = OptionValuesLimitedDTO::fromArray($limitedValues);
        }

        return new self(
            isset($data['limitingParameterId']) ? (int)$data['limitingParameterId'] : null,
            $limitedValues
        );
    }
}
