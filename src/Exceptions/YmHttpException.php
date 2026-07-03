<?php


namespace Escorp\YmApiClient\Exceptions;

use Escorp\YmApiClient\Dto\YmErrorDto;

/**
 * Расширенный Exception для ошибок Http
 *
 */
class YmHttpException extends YmApiClientException
{
    private $httpStatus;

    /**
     * DTO ошибки Ym
     * @var YmErrorDto
     */
    private YmErrorDto $error;

    /**
     *
     * @param YmErrorDto $error
     */
    public function __construct(YmErrorDto $error, $httpStatus = null)
    {
        parent::__construct($error->title . ': ' . $error->detail, $error->status);
        $this->error = $error;
        $this->httpStatus = $httpStatus;
    }

    /**
     * Возвращает DTO ошибки WB
     * @return YmErrorDto
     */
    public function getError(): YmErrorDto
    {
        return $this->error;
    }

    public function getStatus()
    {
        return $this->getStatus();
    }
}
