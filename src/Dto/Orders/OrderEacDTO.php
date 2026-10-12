<?php

namespace Escorp\YmApiClient\Dto\Orders;


use Escorp\YmApiClient\Exceptions\DtoMappingException;

/**
 * Информация о коде подтверждения.
 */
class OrderEacDTO
{

    /**
     * Тип кода подтверждения ЭАПП.
     * @var string
     */
    public string $eacType;

    /**
     * Код подтверждения ЭАПП
     * @var string|null
     */
    public ?string $eacCode;

    /**
     *
     * @param string $eacType
     * @param string|null $eacCode
     */
    function __construct(string $eacType, ?string $eacCode) {
        $this->eacType = $eacType;
        $this->eacCode = $eacCode;
    }

    /**
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        foreach (['eacType'] as $key) {
            if (!array_key_exists($key, $data)) {
                throw new DtoMappingException("OrderEacDTO: missing field '{$key}'");
            }
        }

        return new self(
            $data['eacType'],
            $data['eacCode'] ?? null
        );
    }
}
