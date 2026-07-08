<?php

namespace Escorp\YmApiClient\Dto\Campaigns;

use Escorp\YmApiClient\Dto\TimePeriodDto;

/**
 * Расписание работы службы доставки в своем регионе.
 */
class ScheduleDTO {

    /**
     * Список дней, в которые служба доставки не работает
     * @var array
     */
    public array $customHolidays = [];

    /**
     * Список выходных и праздничных дней, в которые служба доставки работает
     * @var array
     */
    public array $customWorkingDays = [];

    /**
     * Итоговый список нерабочих дней службы доставки
     * @var array
     */
    public array $totalHolidays = [];

    /**
     * Список выходных дней недели и государственных праздников.
     * @var array
     */
    public array $weeklyHolidays = [];

    /**
     * Признак работы службы доставки в государственные праздники
     * @var bool|null
     */
    public ?bool $availableOnHolidays;

    /**
     * Период, за который рассчитывается итоговый список нерабочих дней службы доставки
     * @var TimePeriodDto|null
     */
    public ?TimePeriodDto $period;


    function __construct(array $customHolidays, array $customWorkingDays, array $totalHolidays, array $weeklyHolidays, ?bool $availableOnHolidays, ?TimePeriodDto $period) {
        $this->customHolidays = $customHolidays;
        $this->customWorkingDays = $customWorkingDays;
        $this->totalHolidays = $totalHolidays;
        $this->weeklyHolidays = $weeklyHolidays;
        $this->availableOnHolidays = $availableOnHolidays;
        $this->period = $period;
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
            $data['customHolidays'] ?? [],
            $data['customWorkingDays'] ?? [],
            $data['totalHolidays'] ?? [],
            $data['weeklyHolidays'] ?? [],
            isset($data['availableOnHolidays']) ? (bool)$data['availableOnHolidays'] : null,
            isset($data['period']) ? TimePeriodDto::fromArray($data['period']) : null
        );
    }
}
