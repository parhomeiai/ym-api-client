<?php

namespace Escorp\YmApiClient\Dto\Pages;

/**
 * Модель для пагинации
 */
class PagerDTO {

    /**
     * Текущая страница.
     * @var int|null
     */
    public ?int $currentPage;

    /**
     * Начальный номер найденного элемента на странице.
     * @var int|null
     */
    public ?int $from;

    /**
     * Общее количество страниц.
     * @var int|null
     */
    public ?int $pagesCount;

    /**
     * Размер страницы.
     * @var int|null
     */
    public ?int $pageSize;

    /**
     * Конечный номер найденного элемента на странице.
     * @var int|null
     */
    public ?int $to;

    /**
     * Сколько всего найдено элементов.
     * @var int|null
     */
    public ?int $total;

    /**
     *
     * @param int|null $currentPage
     * @param int|null $from
     * @param int|null $pagesCount
     * @param int|null $pageSize
     * @param int|null $to
     * @param int|null $total
     */
    function __construct(?int $currentPage, ?int $from, ?int $pagesCount, ?int $pageSize, ?int $to, ?int $total) {
        $this->currentPage = $currentPage;
        $this->from = $from;
        $this->pagesCount = $pagesCount;
        $this->pageSize = $pageSize;
        $this->to = $to;
        $this->total = $total;
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
            isset($data['currentPage']) ? (int)$data['currentPage'] : null,
            isset($data['from']) ? (int)$data['from'] : null,
            isset($data['pagesCount']) ? (int)$data['pagesCount'] : null,
            isset($data['pageSize']) ? (int)$data['pageSize'] : null,
            isset($data['to']) ? (int)$data['to'] : null,
            isset($data['total']) ? (int)$data['total'] : null
        );
    }
}
