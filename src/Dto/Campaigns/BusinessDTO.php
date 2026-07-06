<?php

namespace Escorp\YmApiClient\Dto\Campaigns;

/**
 * Информация о кабинете.
 */
class BusinessDTO {

    /**
     * Идентификатор кабинета
     * @var int|null
     */
    public ?int $id;

    /**
     * Название бизнеса.
     * @var string|null
     */
    public ?string $name;

    /**
     *
     * @param int|null $id
     * @param string|null $name
     */
    function __construct(?int $id, ?string $name)
    {
        $this->id = $id;
        $this->name = $name;
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
            isset($data['name']) ? (string)$data['name'] : null
        );
    }
}
