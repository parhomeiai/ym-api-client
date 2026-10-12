<?php

namespace Escorp\YmApiClient\Dto\Orders;

use Escorp\YmApiClient\Dto\CurrencyValueDTO;

/**
 * Валюта и ее значение.
 */
class DeliveryPriceDTO {

    /**
     * Платеж покупателя за доставку.
     * @var CurrencyValueDTO|null
     */
    public ?CurrencyValueDTO $payment;

    /**
     * Вознаграждение Маркета за доставку.
     * @var CurrencyValueDTO|null
     */
    public ?CurrencyValueDTO $subsidy;

    /**
     * НДС на доставку.
     * @var string|null
     */
    public ?string $vat;

    /**
     *
     * @param CurrencyValueDTO|null $payment
     * @param CurrencyValueDTO|null $subsidy
     * @param string|null $vat
     */
    function __construct(?CurrencyValueDTO $payment, ?CurrencyValueDTO $subsidy, ?string $vat) {
        $this->payment = $payment;
        $this->subsidy = $subsidy;
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
            isset($data['payment']) ? CurrencyValueDTO::fromArray($data['payment']) : null,
            isset($data['subsidy']) ? CurrencyValueDTO::fromArray($data['subsidy']) : null,
            $data['vat'] ?? null
        );
    }
}
