<?php

namespace Escorp\YmApiClient\Dto\Campaigns;

/**
 * Информация о кабинете.
 */
class SettingsDTO {

    /**
     * Коды валют
     * @var string|null
     */
    public ?string $currency;

    /**
     * Управление ценами на товары
     * @var bool|null
     */
    public ?bool $onlyDefaultPrice;

    /**
     *
     * @param string|null $currency
     * @param bool|null $onlyDefaultPrice
     */
    function __construct(?string $currency, ?bool $onlyDefaultPrice) {
        $this->currency = $currency;
        $this->onlyDefaultPrice = $onlyDefaultPrice;
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
            isset($data['currency']) ? (string)$data['currency'] : null,
            isset($data['onlyDefaultPrice']) ? (bool)$data['onlyDefaultPrice'] : null
        );
    }
}
