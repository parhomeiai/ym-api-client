<?php

namespace Escorp\YmApiClient\Dto\Orders;

use Escorp\YmApiClient\Dto\CurrencyValueDTO;

/**
 * Информация о выплатах и вознаграждениях.
 */
class PriceDTO {

    /**
     * Сумма, которая оплачена баллами Плюса.
     * @var CurrencyValueDTO|null
     */
    public ?CurrencyValueDTO $cashback;

    /**
     * Общая стоимость всех единиц товара.
     * @var CurrencyValueDTO|null
     */
    public ?CurrencyValueDTO $payment;

    /**
     * Общая сумма вознаграждений продавцу.
     * @var CurrencyValueDTO|null
     */
    public ?CurrencyValueDTO $subsidy;

    /**
     * Информация о стоимости доставки, включая подъем на этаж.
     * @var DeliveryPriceDTO|null
     */
    public ?DeliveryPriceDTO $delivery;

    /**
     * НДС на товар.
     * @var string|null
     */
    public ?string $vat;

    function __construct(?CurrencyValueDTO $cashback, ?CurrencyValueDTO $payment, ?CurrencyValueDTO $subsidy, ?DeliveryPriceDTO $delivery, ?string $vat) {
        $this->cashback = $cashback;
        $this->payment = $payment;
        $this->subsidy = $subsidy;
        $this->delivery = $delivery;
        $this->vat = $vat;
    }

        /**
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            isset($data['cashback']) ? CurrencyValueDTO::fromArray($data['cashback']) : null,
            isset($data['payment']) ? CurrencyValueDTO::fromArray($data['payment']) : null,
            isset($data['subsidy']) ? CurrencyValueDTO::fromArray($data['subsidy']) : null,
            isset($data['delivery']) ? DeliveryPriceDTO::fromArray($data['subsidy']) : null,
            $data['vat'] ?? null
        );
    }
}
