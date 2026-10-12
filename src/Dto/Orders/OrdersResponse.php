<?php

namespace Escorp\YmApiClient\Dto\Orders;

use Escorp\YmApiClient\Dto\YmApiResponseDto;
use Escorp\YmApiClient\Dto\Pages\PagingDTO;

/**
 * Ответ на запрос Информация о заказах в кабинете
 *
 * Используется в endpoint:
 * POST https://api.partner.market.yandex.ru/v1/businesses/{businessId}/orders
 */
class OrdersResponse extends YmApiResponseDto
{
    /**
     *
     * @var array
     */
    public array $orders = [];

    /**
     *
     * @var PagerDTO|null
     */
    public ?PagingDTO $paging;


    public static function fromArray(array $response): self
    {
        $ymApiResponseDto = parent::fromArray($response);

        $dto = new self($ymApiResponseDto->data);

        $orders = $response['orders'] ?? [];

        foreach ($orders as $order) {
            $dto->orders[] = OrderDTO::fromArray($order);
        }

        if(isset($response['paging'])){
            $dto->paging = PagingDTO::fromArray($response['paging']);
        }

        return $dto;
    }


}
