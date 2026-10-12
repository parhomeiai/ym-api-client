<?php

namespace Escorp\YmApiClient\Dto;

use Escorp\YmApiClient\Exceptions\DtoMappingException;

/**
 * GPS-координаты широты и долготы.
 */
class GpsDTO {

    /**
     * Широта
     * @var string
     */
    public float $latitude;

    /**
     * Долгота
     * @var float
     */
    public float $longitude;

    /**
     *
     * @param float $latitude
     * @param float $longitude
     */
    function __construct(float $latitude, float $longitude) {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        foreach (['latitude', 'longitude'] as $key) {
            if (!array_key_exists($key, $data)) {
                throw new DtoMappingException("GpsDTO: missing field '{$key}'");
            }
        }

        return new self(
            (float)$data['latitude'],
            (float)$data['longitude'],
        );
    }
}
