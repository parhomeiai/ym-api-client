<?php

namespace Escorp\YmApiClient\Dto\Products;

/**
 * Единицы измерения характеристики товара.
 */
class CategoryParameterUnitDTO {

    /**
     * Единица измерения по умолчанию.
     * @var int|null
     */
    public ?int $defaultUnitId;

    /**
     * Допустимые единицы измерения.
     * @var array | UnitDTO[]
     */
    public array $units = [];

    function __construct(?int $defaultUnitId, array $units) {
        $this->defaultUnitId = $defaultUnitId;
        $this->units = $units;
    }


    /**
     *
     * @param array $data
     * @return self
     * @throws DtoMappingException
     */
    public static function fromArray(array $data): self
    {
        $units = [];

        foreach($data['units'] ?? [] as $unit){
            $units[] = UnitDTO::fromArray($unit);
        }

        return new self(
            isset($data['defaultUnitId']) ? (int)$data['defaultUnitId'] : null,
            $units
        );
    }
}
