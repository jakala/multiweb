<?php

namespace App\Infrastructure\Exception;

use App\Shared\Domain\Exception\DomainError;

class WebInvalid extends DomainError
{
    public function __construct(private readonly string $host)
    {
    }

    protected function code(): string
    {
        return 'web_not_found';
    }

    protected function message(): string
    {
        return sprintf('Url <%s> not exist.', $this->host);
    }
}
