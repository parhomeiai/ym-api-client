<?php

namespace Escorp\YmApiClient\Dto;

/**
 * Сообщение об ошибке
 *
 */
class YmErrorResponseDto
{

    /**
     * Данные
     * @var mixed
     */
    public $data;


    /**
     * Ошибки
     * @var mixed
     */
    public array $errors;

    /**
     * Код http ответа
     * @var int|null
     */
    public ?string $status;

    /**
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        $dto = new self();

        $dto->data = $data;

        $errors = [];
        if(isset($data['errors']) && is_array($data['errors'])){
            foreach($data['errors'] as $error){
                $errors[] = YmErrorDto::fromArray($error);
            }
        }

        $dto->status       = isset($data['status']) ? (string)$data['status'] : null;
        $dto->errors       = $errors;

        return $dto;
    }
}
