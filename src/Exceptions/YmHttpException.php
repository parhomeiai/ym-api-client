<?php


namespace Escorp\YmApiClient\Exceptions;

use Escorp\YmApiClient\Dto\YmErrorResponseDto;

/**
 * Расширенный Exception для ошибок Http
 *
 */
class YmHttpException extends YmApiClientException
{
    private $httpStatus;

    /**
     * DTO ошибки Ym
     * @var YmErrorResponseDto
     */
    private YmErrorResponseDto $error;

    /**
     *
     * @param YmErrorDto $error
     */
    public function __construct(YmErrorResponseDto $error, $httpStatus = null)
    {
        parent::__construct('Ошибка', (int)$httpStatus);

        $this->error = $error;
        $this->httpStatus = $httpStatus;
    }

    /**
     * Возвращает DTO ошибки WB
     * @return YmErrorDto
     */
    public function getError(): YmErrorResponseDto
    {
        return $this->error;
    }

    public function getStatus()
    {
        return $this->getStatus();
    }
}
