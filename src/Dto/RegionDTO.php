<?php

namespace Escorp\YmApiClient\Dto;

use Escorp\YmApiClient\Exceptions\DtoMappingException;

/**
 * Регион доставки.
 */
class RegionDTO {

    /**
     * Идентификатор региона.
     * @var int
     */
    public int $id;

    /**
     * Название региона.
     * @var string
     */
    public string $name;

    /**
     * Тип региона.
     * @var string
     */
    public string $type;

    /**
     * Информация о родительском регионе.
     * @var RegionDTO|null
     */
    public ?RegionDTO $parent;

    function __construct(int $id, string $name, string $type, ?RegionDTO $parent) {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->parent = $parent;
    }

        /**
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        foreach (['id', 'name', 'type'] as $key) {
            if (!array_key_exists($key, $data)) {
                throw new DtoMappingException("RegionDTO: missing field '{$key}'");
            }
        }

        return new self(
            (int)$data['id'],
            (float)$data['name'],
            (float)$data['type'],
            isset($data['parent']) ? self::fromArray($data['parent']) : null
        );
    }
}
