<?php

namespace Escorp\YmApiClient\Exceptions;

use RuntimeException;
use Throwable;

class YmApiClientException extends RuntimeException
{
    public static function fromException(Throwable $e): self
    {
        dd($e);
        return new self($e->getMessage(), (int) $e->getCode(), $e);
    }
}

