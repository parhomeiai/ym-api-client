<?php

namespace Escorp\YmApiClient\Dto\Products;

use Escorp\YmApiClient\Dto\YmApiResponseDto;
use Escorp\YmApiClient\Dto\Products\CategoryDTO;

/**
 * Ответ на запрос Дерево категорий
 *
 * Используется в endpoint:
 * POST https://yandex.ru/dev/market/partner-api/doc/ru/reference/categories/getCategoriesTree
 */
class CategoriesTreeResponse extends YmApiResponseDto
{
    /**
     *
     * @var string|null
     */
    public ?string $status;

    /**
     * Все категории
     * @var CategoryDTO|null
     */
    public ?CategoryDTO $result;


    public static function fromArray(array $response): self
    {
        $ymApiResponseDto = parent::fromArray($response);

        $dto = new self($ymApiResponseDto->data);

        $dto->status = $response['status'] ?? null;

        if(isset($response['result'])){
            $dto->result = CategoryDTO::fromArray($response['result']);
        }

        return $dto;
    }


}
