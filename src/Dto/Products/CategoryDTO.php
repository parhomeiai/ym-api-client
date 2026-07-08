<?php

namespace Escorp\YmApiClient\Dto\Products;

/**
 * Информация о категории.
 */
class CategoryDTO {

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
     * Дочерние категории.
     * @var array | CategoryDTO[]
     */
    public array $children = [];

    /**
     *
     * @param int|null $id
     * @param string|null $name
     * @param array $children
     */
    function __construct(?int $id, ?string $name, array $children) {
        $this->id = $id;
        $this->name = $name;
        $this->children = $children;
    }

    /**
     *
     * @param array $data
     * @return self
     * @throws DtoMappingException
     */
    public static function fromArray(array $data): self
    {
        $children = [];

        foreach($data['children'] ?? [] as $category){
            $children[] = self::fromArray($category);
        }

        return new self(
            isset($data['id']) ? (int)$data['id'] : null,
            isset($data['name']) ? (string)$data['name'] : null,
            $children
        );
    }
}
