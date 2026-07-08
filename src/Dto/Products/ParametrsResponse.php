<?php

namespace Escorp\YmApiClient\Dto\Products;

use Escorp\YmApiClient\Dto\YmApiResponseDto;

/**
 * Ответ на запрос Списки характеристик товаров по категориям
 *
 * Используется в endpoint:
 * POST https://yandex.ru/dev/market/partner-api/doc/ru/reference/content/getCategoryContentParameters
 */
class ParametrsResponse extends YmApiResponseDto
{
    /**
     *
     * @var string|null
     */
    public ?string $status;

    /**
     * Все категории
     * @var CategoryContentParametersDTO|null
     */
    public ?CategoryContentParametersDTO $result;


    public static function fromArray(array $response): self
    {
        $ymApiResponseDto = parent::fromArray($response);

        $dto = new self($ymApiResponseDto->data);

        $dto->status = $response['status'] ?? null;

        if(isset($response['result'])){
            $dto->result = CategoryContentParametersDTO::fromArray($response['result']);
        }

        return $dto;
    }


}
