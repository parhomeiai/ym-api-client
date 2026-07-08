<?php

namespace Escorp\YmApiClient\Dto\Products;

/**
 * Единица измерения.
 */
class UnitDTO {

    /**
     * Идентификатор категории.
     * @var int|null
     */
    public ?int $id;

    /**
     * Название категории.
     * @var string|null
     */
    public ?string $name;

    /**
     * Полное название единицы измерения.
     * @var string|null
     */
    public ?string $fullName;

    /**
     *
     * @param int|null $id
     * @param string|null $name
     * @param string|null $fullName
     */
    function __construct(?int $id, ?string $name, ?string $fullName) {
        $this->id = $id;
        $this->name = $name;
        $this->fullName = $fullName;
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
            isset($data['id']) ? (int)$data['id'] : null,
            isset($data['name']) ? (string)$data['name'] : null,
            isset($data['fullName']) ? (string)$data['fullName'] : null
        );
    }
}
