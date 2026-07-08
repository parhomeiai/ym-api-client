<?php

namespace Escorp\YmApiClient\Dto;

/**
 * Период
 *
 */
class TimePeriodDto
{
    /**
     * Дата (включительно) начала периода
     * @var string|null
     */
    public ?string $fromDate;

    /**
     * Дата (включительно) окончания периода
     * @var string|null
     */
    public ?string $toDate;


    function __construct(?string $fromDate, ?string $toDate) {
        $this->fromDate = $fromDate;
        $this->toDate = $toDate;
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
            isset($data['fromDate']) ? (string)$data['fromDate'] : null,
            isset($data['toDate']) ? (string)$data['toDate'] : null
        );
    }
}
