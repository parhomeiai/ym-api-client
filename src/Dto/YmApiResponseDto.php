<?php

declare(strict_types=1);

namespace Escorp\YmApiClient\Dto;

/**
 * Ответ Ym
 */
class YmApiResponseDto
{
    /** @var mixed */
    public $data;

    /**
     *
     * @param mixed $data
     * @param bool $error
     * @param string $errorText
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     *
     * @param array $response
     * @return self
     */
    public static function fromArray(array $response): self
    {
        return new self(
            $response['data'] ?? $response,
        );
    }

    /**
     * Возвращает сырые данные
     * @return mixed
     */
    function getData()
    {
        return $this->data;
    }
}

