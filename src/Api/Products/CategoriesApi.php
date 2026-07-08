<?php

namespace Escorp\YmApiClient\Api\Products;

use Escorp\YmApiClient\Api\AbstractYmApi;

use Escorp\YmApiClient\Dto\Products\CategoriesTreeResponse;
use Escorp\YmApiClient\Dto\Products\ParametrsResponse;


/**
 * Категории
 */
class CategoriesApi extends AbstractYmApi
{

    /**
     * Возвращает дерево категорий Маркета.
     *
     * @param string $language
     * @return CategoriesTreeResponse
     */
    public function getCategoriesЕree(string $language = 'RU'): CategoriesTreeResponse
    {
        $url = $this->baseUrl . '/v2/categories/tree';

        $response = $this->request('POST', $url, [
                'json' => ['language' => $language]
            ]);

        return CategoriesTreeResponse::fromArray($response);
    }

    /**
     * Возвращает список характеристик с допустимыми значениями для заданной листовой категории.
     *
     * @param int $categoryId
     * @param int|null $businessId
     * @return CategoryContentParametersDTO
     */
    public function getParametrs(int $categoryId, ?int $businessId = null): ParametrsResponse
    {
        $url = $this->baseUrl . '/v2/category/' . $categoryId . '/parameters';

        $response = $this->request('POST', $url, [
                'query' => ['businessId' => $businessId]
            ]);

        return ParametrsResponse::fromArray($response);
    }
}
