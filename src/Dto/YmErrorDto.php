<?php

namespace Escorp\YmApiClient\Dto;

/**
 * Данные об ошибке
 *
 */
class YmErrorDto
{

    /**
     * Данные
     * @var mixed
     */
    public $data;


    /**
     * Ошибка
     * @var string|null
     */
    public ?string $code;

    /**
     * Детали ошибки
     * @var string|null
     */
    public ?string $message;


    /**
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        $dto = new self();

        $dto->data = $data;

        $dto->code       = $data['code'] ?? null;
        $dto->message  = $data['message'] ?? null;

        return $dto;
    }
}
