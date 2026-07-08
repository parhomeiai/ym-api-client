<?php

namespace Escorp\YmApiClient\Dto\Campaigns;

/**
 * Настройки магазина.
 */
class CampaignSettingsDTO {

    /**
     * Идентификатор региона, в котором находится магазин.
     * @var int|null
     */
    public ?int $countryRegion;

    /**
     * Наименование магазина на Яндекс Маркете
     * @var string|null
     */
    public ?string $shopName;

    /**
     * Признак размещения магазина на сайтах партнеров Яндекс Дистрибуции
     * @var bool|null
     */
    public ?bool $showInContext;

    /**
     * Признак показа предложений магазина в блоке над результатами поиска (cпецразмещение).
     * @var bool|null
     */
    public ?bool $showInPremium;

    /**
     * Признак использования внешней интернет-статистики
     * @var bool|null
     */
    public ?bool $useOpenStat;

    /**
     * Информация о своем регионе магазина.
     * @var LocalRegionDTO|null
     */
    public ?LocalRegionDTO $localRegion;

    /**
     *
     * @var type
     */
    public $taxation;


    function __construct(?int $countryRegion, ?string $shopName, ?bool $showInContext, ?bool $showInPremium, ?bool $useOpenStat, ?LocalRegionDTO $localRegion, $taxation) {
        $this->countryRegion = $countryRegion;
        $this->shopName = $shopName;
        $this->showInContext = $showInContext;
        $this->showInPremium = $showInPremium;
        $this->useOpenStat = $useOpenStat;
        $this->localRegion = $localRegion;
        $this->taxation = $taxation;
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
            isset($data['countryRegion']) ? (int)$data['countryRegion'] : null,
            isset($data['shopName']) ? (string)$data['shopName'] : null,
            isset($data['showInContext']) ? (bool)$data['showInContext'] : null,
            isset($data['showInPremium']) ? (bool)$data['showInPremium'] : null,
            isset($data['useOpenStat']) ? (bool)$data['useOpenStat'] : null,
            isset($data['localRegion']) ? LocalRegionDTO::fromArray($data['localRegion']) : null,
            $data['taxation'] ?? null
        );
    }
}
