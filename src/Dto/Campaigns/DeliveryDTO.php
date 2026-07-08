<?php

namespace Escorp\YmApiClient\Dto\Campaigns;

/**
 * Информация о доставке в своем регионе магазина.
 */
class DeliveryDTO {

    /**
     * Расписание работы службы доставки в своем регионе.
     * @var ScheduleDTO|null
     */
    public ?ScheduleDTO $schedule;

    function __construct(?ScheduleDTO $schedule) {
        $this->schedule = $schedule;
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
            isset($data['schedule']) ? ScheduleDTO::fromArray($data['schedule']) : null,
        );
    }
}
