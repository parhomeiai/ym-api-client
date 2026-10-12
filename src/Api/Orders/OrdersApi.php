<?php

namespace Escorp\YmApiClient\Api\Orders;

use Escorp\YmApiClient\Api\AbstractYmApi;

use Escorp\YmApiClient\Dto\Orders\OrdersResponse;



/**
 * заказы
 */
class OrdersApi extends AbstractYmApi
{
    /**
     * Возвращает заказы по фильтрам https://yandex.ru/dev/market/partner-api/doc/ru/reference/orders/getBusinessOrders
     *
     * @param int $businessId
     * @param array $filter
     * @param int $limit
     * @param string $pageToken
     * @return type
     */
    public function orders(int $businessId, array $filter = [], int $limit = 50, string $pageToken = ''): OrdersResponse
    {
        $url = $this->baseUrl . '/v1/businesses/' . $businessId . '/orders';

        if(empty($filter)){
            $filter = [
                'fake' => false
            ];
        }

        $response = $this->request('POST', $url, [
                'json' => $filter
            ]);

        return OrdersResponse::fromArray($response);
    }

}
