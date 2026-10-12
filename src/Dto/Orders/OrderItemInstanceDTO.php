<?php

namespace Escorp\YmApiClient\Dto\Orders;

/**
 * Переданные для данной позиции коды маркировки или УИНы. Коды «Честного знака» возвращаются в двух вариантах — с криптохвостом и без.
 */
class OrderItemInstanceDTO {

    /**
     * Код идентификации единицы товара в системе «Честный ЗНАК» без криптохвоста или «ASL BELGISI» (для продавцов Market Yandex Go).
     * @var string|null
     */
    public ?string $cis;

    /**
     * Код идентификации единицы товара в системе «Честный ЗНАК» с криптохвостом.
     * @var string|null
     */
    public ?string $cisFull;

    /**
     * Страна производства в формате ISO 3166-1 alpha-2
     * @var string|null
     */
    public ?string $countryCode;

    /**
     * Грузовая таможенная декларация.
     * @var string|null
     */
    public ?string $gtd;

    /**
     * Регистрационный номер партии товара.
     * @var string|null
     */
    public ?string $rnpt;

    /**
     * УИН ювелирного изделия (16-значный код) Производитель получает УИН, когда регистрирует изделие в системе контроля за оборотом драгоценных металлов и камней — ГИИС ДМДК.
     * @var string|null
     */
    public ?string $uin;

    /**
     *
     * @param string|null $cis
     * @param string|null $cisFull
     * @param string|null $countryCode
     * @param string|null $gtd
     * @param string|null $rnpt
     * @param string|null $uin
     */
    function __construct(?string $cis, ?string $cisFull, ?string $countryCode, ?string $gtd, ?string $rnpt, ?string $uin) {
        $this->cis = $cis;
        $this->cisFull = $cisFull;
        $this->countryCode = $countryCode;
        $this->gtd = $gtd;
        $this->rnpt = $rnpt;
        $this->uin = $uin;
    }

    /**
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            isset($data['cis']) ?? null,
            isset($data['cisFull']) ?? null,
            isset($data['countryCode']) ?? null,
            isset($data['gtd']) ?? null,
            isset($data['rnpt']) ?? null,
            isset($data['uin']) ?? null,
        );
    }
}
