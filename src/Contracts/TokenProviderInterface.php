<?php

namespace Escorp\YmApiClient\Contracts;

interface TokenProviderInterface
{
    public function getToken(): string;
}