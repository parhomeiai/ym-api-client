<?php

namespace Escorp\YmApiClient\Dto\Orders;

use Escorp\YmApiClient\Exceptions\DtoMappingException;
use InvalidArgumentException;

/**
 * Информация о доставке заказа.
 */
class OrderDeliveryDTO {

    /**
     * Диапазон дат доставки.
     * @var OrderDeliveryDatesDTO
     */
    public OrderDeliveryDatesDTO $dates;

    /**
     * Тип сотрудничества со службой доставки в рамках указанного заказа.
     * @var string
     */
    public string $deliveryPartnerType;

    /**
     * Идентификатор службы доставки.
     * @var int
     */
    public int $deliveryServiceId;

    /**
     * Название службы доставки.
     * @var string
     */
    public string $serviceName;

    /**
     * Способ доставки заказа.
     * @var string
     */
    public string $type;

    /**
     * Раскладка товаров по коробкам.
     * @var array|null | OrderBoxLayoutDTO[]
     */
    public ?array $boxesLayout;

    public ?OrderCourierDeliveryDTO $courier;

    /**
     * Информация о доставке цифрового товара.
     * @var DigitalGoodsDeliveryDetailsDTO|null
     */
    public ?DigitalGoodsDeliveryDetailsDTO $digitalGoods;

    /**
     * Способ доставки:
     *  BUYER — курьерская доставка покупателю.
     *  MARKET_BRANDED_OUTLET — доставка в пункт выдачи заказов Маркета.
     *  SHOP_OUTLET — доставка в пункт выдачи заказов магазина
     *  UNKNOWN — неизвестный тип.
     * @var string|null
     */
    public ?string $dispatchType;

    /**
     * Приблизительная ли дата доставки.
     * @var bool
     */
    public bool $estimated = false;

    /**
     * Информация о доставке в пункт выдачи.
     * @var OrderPickupDeliveryDTO|null
     */
    public ?OrderPickupDeliveryDTO $pickup;

    /**
     * Штрихкод получения заказа на ПВЗ.
     * @var string|null
     */
    public ?string $receiveBarcode;

    /**
     * Код получения заказа на ПВЗ.
     * @var string|null
     */
    public ?string $receiveCode;

    /**
     * Информация об отгрузке.
     * @var OrderShipmentDTO|null
     */
    public ?OrderShipmentDTO $shipment;

    /**
     * Информация для отслеживания посылки.
     * @var array|null | OrderTrackDTO[]
     */
    public ?array $tracks;

    /**
     * Информация о курьере и код подтверждения.
     * @var OrderTransferDTO|null
     */
    public ?OrderTransferDTO $transfer;

    /**
     * Идентификатор склада в системе магазина, на который сформирован заказ
     * @var string|null
     */
    public ?string $warehouseId;

    /**
     *
     * @param OrderDeliveryDatesDTO $dates
     * @param string $deliveryPartnerType
     * @param int $deliveryServiceId
     * @param string $serviceName
     * @param string $type
     * @param array|null $boxesLayout
     * @param OrderCourierDeliveryDTO|null $courier
     * @param DigitalGoodsDeliveryDetailsDTO|null $digitalGoods
     * @param string|null $dispatchType
     * @param bool $estimated
     * @param OrderPickupDeliveryDTO|null $pickup
     * @param string|null $receiveBarcode
     * @param string|null $receiveCode
     * @param OrderShipmentDTO|null $shipment
     * @param array|null $tracks
     * @param OrderTransferDTO|null $transfer
     * @param string|null $warehouseId
     */
    function __construct(OrderDeliveryDatesDTO $dates, string $deliveryPartnerType, int $deliveryServiceId, string $serviceName, string $type, ?array $boxesLayout, ?OrderCourierDeliveryDTO $courier, ?DigitalGoodsDeliveryDetailsDTO $digitalGoods, ?string $dispatchType, bool $estimated, ?OrderPickupDeliveryDTO $pickup, ?string $receiveBarcode, ?string $receiveCode, ?OrderShipmentDTO $shipment, ?array $tracks, ?OrderTransferDTO $transfer, ?string $warehouseId)
    {
        if($boxesLayout){
            foreach ($boxesLayout as $b) {
                if (!$b instanceof OrderBoxLayoutDTO) {
                    throw new InvalidArgumentException('boxesLayout must contain OrderBoxLayoutDTO');
                }
            }
        }
        if($tracks){
            foreach ($tracks as $t) {
                if (!$t instanceof OrderTrackDTO) {
                    throw new InvalidArgumentException('tracks must contain OrderTrackDTO');
                }
            }
        }

        $this->dates = $dates;
        $this->deliveryPartnerType = $deliveryPartnerType;
        $this->deliveryServiceId = $deliveryServiceId;
        $this->serviceName = $serviceName;
        $this->type = $type;
        $this->boxesLayout = $boxesLayout;
        $this->courier = $courier;
        $this->digitalGoods = $digitalGoods;
        $this->dispatchType = $dispatchType;
        $this->estimated = $estimated;
        $this->pickup = $pickup;
        $this->receiveBarcode = $receiveBarcode;
        $this->receiveCode = $receiveCode;
        $this->shipment = $shipment;
        $this->tracks = $tracks;
        $this->transfer = $transfer;
        $this->warehouseId = $warehouseId;
    }

    /**
     *
     * @param array $data
     * @return self
     * @throws DtoMappingException
     */
    public static function fromArray(array $data): self
    {
        foreach (['dates', 'deliveryPartnerType', 'deliveryServiceId', 'serviceName', 'type'] as $key) {
            if (!array_key_exists($key, $data)) {
                throw new DtoMappingException("OrderDeliveryDTO: missing field '{$key}'");
            }
        }

        if(isset($data['boxesLayout'])){
            $boxesLayout = [];

            foreach ($data['boxesLayout'] ?? [] as $boxe) {
                $boxesLayout[] = OrderBoxLayoutDTO::fromArray($boxe);
            }
        }

        if(isset($data['tracks'])){
            $tracks = [];

            foreach ($data['tracks'] ?? [] as $track) {
                $tracks[] = OrderTrackDTO::fromArray($track);
            }
        }

        return new self(
            OrderDeliveryDatesDTO::fromArray($data['dates']),
            $data['deliveryPartnerType'],
            (int)$data['deliveryServiceId'],
            $data['serviceName'],
            $data['type'],
            $boxesLayout ?? null,
            isset($data['courier']) ? OrderCourierDeliveryDTO::fromArray($data['courier']) : null,
            isset($data['digitalGoods']) ? DigitalGoodsDeliveryDetailsDTO::fromArray($data['digitalGoods']) : null,
            $data['dispatchType'] ?? null,
            isset($data['estimated']) ? $data['estimated'] : false,
            isset($data['pickup']) ? OrderPickupDeliveryDTO::fromArray($data['pickup']) : null,
            $data['receiveBarcode'] ?? null,
            $data['receiveCode'] ?? null,
            isset($data['shipment']) ? OrderShipmentDTO::fromArray($data['shipment']) : null,
            $tracks ?? null,
            isset($data['transfer']) ? OrderTransferDTO::fromArray($data['transfer']) : null,
            $data['warehouseId'] ?? null,
        );
    }
}
