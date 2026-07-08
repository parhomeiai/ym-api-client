<?php

namespace Escorp\YmApiClient\Dto\Products;

/**
 * Информация о параметрах категории.
 */
class CategoryContentParametersDTO {

    /**
     * Идентификатор категории на Маркете.
     * @var int|null
     */
    public ?int $categoryId;

    /**
     * Список характеристик.
     * @var array | CategoryParameterDTO[]
     */
    public array $parameters = [];


    /**
     *
     * @param int|null $categoryId
     * @param array $parameters
     */
    function __construct(?int $categoryId, array $parameters) {
        $this->categoryId = $categoryId;
        $this->parameters = $parameters;
    }

        /**
     *
     * @param array $data
     * @return self
     * @throws DtoMappingException
     */
    public static function fromArray(array $data): self
    {
        $parameters = [];

        foreach($data['parameters'] ?? [] as $parameter){
            $parameters[] = CategoryParameterDTO::fromArray($parameter);
        }

        return new self(
            isset($data['categoryId']) ? (int)$data['categoryId'] : null,
            $parameters
        );
    }
}
