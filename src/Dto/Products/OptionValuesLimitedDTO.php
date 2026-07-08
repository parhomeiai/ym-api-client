<?php

namespace Escorp\YmApiClient\Dto\Products;

/**
 * Значение ограничивающей характеристики и список допустимых значений ограничиваемой характеристики.
 */
class OptionValuesLimitedDTO {

    /**
     * Идентификатор значения ограничивающей характеристики.
     * @var int|null
     */
    public ?int $limitingOptionValueId;

    /**
     * Идентификаторы допустимых значений ограничиваемой характеристики.
     * @var array | integer[]
     */
    public array $optionValueIds = [];

    /**
     *
     * @param int|null $limitingOptionValueId
     * @param array $optionValueIds
     */
    function __construct(?int $limitingOptionValueId, array $optionValueIds) {
        $this->limitingOptionValueId = $limitingOptionValueId;
        $this->optionValueIds = $optionValueIds;
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
            isset($data['limitingOptionValueId']) ? (int)$data['limitingOptionValueId'] : null,
            $data['optionValueIds'] ?? []
        );
    }
}
