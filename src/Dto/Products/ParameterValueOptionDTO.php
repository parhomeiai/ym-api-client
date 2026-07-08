<?php

namespace Escorp\YmApiClient\Dto\Products;

/**
 * Значение характеристики.
 */
class ParameterValueOptionDTO {

    /**
     * Идентификатор значения.
     * @var int|null
     */
    public ?int $id;

    /**
     * Значение
     * @var string|null
     */
    public ?string $value;

    /**
     * Описание значения.
     * @var string|null
     */
    public ?string $description;


    function __construct(?int $id, ?string $value, ?string $description) {
        $this->id = $id;
        $this->value = $value;
        $this->description = $description;
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
            isset($data['value']) ? (string)$data['value'] : null,
            isset($data['description']) ? (string)$data['description'] : null
        );
    }
}
