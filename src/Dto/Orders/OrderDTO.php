<?php

namespace Escorp\YmApiClient\Dto\Orders;

use Escorp\YmApiClient\Exceptions\DtoMappingException;
use InvalidArgumentException;

/**
 * Информация о заказе.
 */
class OrderDTO {

    /**
     * Идентификатор заказа.
     * @var int
     */
    public int $orderId;

    /**
     * Идентификатор кампании (магазина)
     * @var int
     */
    public int $campaignId;

    /**
     * Статус заказа
     * @var string
     */
    public string $status;

    /**
     * Этап обработки заказа
     * @var string
     */
    public string $substatus;

    /**
     * Дата и время оформления заказа.
     * @var string
     */
    public string $creationDate;

    /**
     * Информация о доставке заказа.
     * @var OrderDeliveryDTO
     */
    public OrderDeliveryDTO $delivery;

    /**
     * Тип заказа: false — настоящий заказ покупателя. true — тестовый заказ Маркета.
     * @var bool
     */
    public bool $fake;

    /**
     * Список товаров в заказе.
     * @var array | OrderItemDTO[]
     */
    public array $items;

    /**
     * Способ оплаты заказа:
     * @var string
     */
    public string $paymentMethod;

    /**
     * Тип оплаты заказа: PREPAID — оплата при оформлении заказа. POSTPAID — оплата при получении заказа. UNKNOWN — неизвестный тип.
     * @var string
     */
    public string $paymentType;

    /**
     * Дата и время последнего обновления заказа.
     * @var string|null
     */
    public ?string $updateDate;

    /**
     * Информация о стоимости заказа, доставки и вознаграждениях.
     * @var PriceDTO|null
     */
    public ?PriceDTO $prices;

    /**
     * Тип покупателя: физическое лицо или организация.
     * @var string|null
     */
    public ?string $buyerType;

    /**
     * Запрошена ли отмена.
     * @var bool
     */
    public bool $cancelRequested = false;

    /**
     * Площадка-источник заказа:
     * @var string|null
     */
    public ?string $sourcePlatform;

    /**
     * Внешний идентификатор заказа, который вы передали в POST v2/campaigns/{campaignId}/orders/{orderId}/external-id.
     * @var string|null
     */
    public ?string $externalOrderId;

    /**
     * Комментарий к заказу.
     * @var string|null
     */
    public ?string $notes;

    /**
     * Тип программы кампании магазина
     * @var string|null
     */
    public ?string $programType;

    function __construct(int $orderId, int $campaignId, string $status, string $substatus, string $creationDate, OrderDeliveryDTO $delivery, bool $fake, array $items, string $paymentMethod, string $paymentType, ?string $updateDate, ?PriceDTO $prices, ?string $buyerType, bool $cancelRequested, ?string $sourcePlatform, ?string $externalOrderId, ?string $notes, ?string $programType)
    {
        foreach ($items as $i) {
            if (!$i instanceof OrderItemDTO) {
                throw new InvalidArgumentException('items must contain OrderItemDTO');
            }
        }

        $this->orderId = $orderId;
        $this->campaignId = $campaignId;
        $this->status = $status;
        $this->substatus = $substatus;
        $this->creationDate = $creationDate;
        $this->delivery = $delivery;
        $this->fake = $fake;
        $this->items = $items;
        $this->paymentMethod = $paymentMethod;
        $this->paymentType = $paymentType;
        $this->updateDate = $updateDate;
        $this->prices = $prices;
        $this->buyerType = $buyerType;
        $this->cancelRequested = $cancelRequested;
        $this->sourcePlatform = $sourcePlatform;
        $this->externalOrderId = $externalOrderId;
        $this->notes = $notes;
        $this->programType = $programType;
    }

    /**
     *
     * @param array $data
     * @return self
     * @throws DtoMappingException
     */
    public static function fromArray(array $data): self
    {
        foreach (['orderId', 'campaignId', 'status', 'substatus', 'creationDate', 'delivery', 'fake', 'items', 'paymentMethod', 'paymentType'] as $key) {
            if (!array_key_exists($key, $data)) {
                throw new DtoMappingException("OrderDTO: missing field '{$key}'");
            }
        }

        $items = [];
        foreach ($data['items'] ?? [] as $item) {
            $items[] = OrderItemDTO::fromArray($item);
        }

        return new self(
            (int)$data['orderId'],
            (int)$data['campaignId'],
            $data['status'],
            $data['substatus'],
            $data['creationDate'],
            OrderDeliveryDTO::fromArray($data['delivery']),
            (bool)$data['fake'],
            $items,
            $data['paymentMethod'],
            $data['paymentType'],
            $data['updateDate'] ?? null,
            isset($data['prices']) ? PriceDTO::fromArray($data['prices']) : null,
            $data['buyerType'] ?? null,
            $data['cancelRequested'] ?? false,
            $data['sourcePlatform'] ?? null,
            $data['externalOrderId'] ?? null,
            $data['notes'] ?? null,
            $data['programType'] ?? null
        );
    }
}
