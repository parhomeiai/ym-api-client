<?php

namespace Escorp\YmApiClient\Dto\Orders;

use Escorp\YmApiClient\Dto\GpsDTO;

/**
 * Адрес доставки.
 */
class OrderDeliveryAddressDTO {

    /**
     * Номер квартиры или офиса.
     * @var string|null
     */
    public ?string $apartment;

    /**
     * Корпус
     * @var string|null
     */
    public ?string $block;

    /**
     * Город или населенный пункт.
     * @var string|null
     */
    public ?string $city;

    /**
     * Страна
     * @var string|null
     */
    public ?string $country;

    /**
     * Район
     * @var string|null
     */
    public ?string $district;

    /**
     * Номер подъезда.
     * @var string|null
     */
    public ?string $entrance;

    /**
     * Код домофона
     * @var string|null
     */
    public ?string $entryphone;

    /**
     * Этаж
     * @var string|null
     */
    public ?string $floor;

    /**
     * GPS-координаты
     * @var GpsDTO|null
     */
    public ?GpsDTO $gps;

    /**
     * Номер дома.
     * @var string|null
     */
    public ?string $house;

    /**
     * Почтовый индекс.
     * @var string|null
     */
    public ?string $postcode;

    /**
     * Улица
     * @var string|null
     */
    public ?string $street;

    /**
     * Станция метро.
     * @var string|null
     */
    public ?string $subway;

    /**
     *
     * @param string|null $apartment
     * @param string|null $block
     * @param string|null $city
     * @param string|null $country
     * @param string|null $district
     * @param string|null $entrance
     * @param string|null $entryphone
     * @param string|null $floor
     * @param GpsDTO|null $gps
     * @param string|null $house
     * @param string|null $postcode
     * @param string|null $street
     * @param string|null $subway
     */
    function __construct(?string $apartment, ?string $block, ?string $city, ?string $country, ?string $district, ?string $entrance, ?string $entryphone, ?string $floor, ?GpsDTO $gps, ?string $house, ?string $postcode, ?string $street, ?string $subway) {
        $this->apartment = $apartment;
        $this->block = $block;
        $this->city = $city;
        $this->country = $country;
        $this->district = $district;
        $this->entrance = $entrance;
        $this->entryphone = $entryphone;
        $this->floor = $floor;
        $this->gps = $gps;
        $this->house = $house;
        $this->postcode = $postcode;
        $this->street = $street;
        $this->subway = $subway;
    }

    /**
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['apartment'] ?? null,
            $data['block'] ?? null,
            $data['city'] ?? null,
            $data['country'] ?? null,
            $data['district'] ?? null,
            $data['entrance'] ?? null,
            $data['floor'] ?? null,
            $data['gps'] ? GpsDTO::fromArray($data['gps']) : null,
            $data['house'] ?? null,
            $data['postcode'] ?? null,
            $data['street'] ?? null,
            $data['subway'] ?? null,
        );
    }
}
