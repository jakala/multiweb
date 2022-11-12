<?php

declare(strict_types=1);

namespace App\Shared\Domain\Exception;

class InvalidNull extends DomainError
{
    public function code(): string
    {
        return 'invalid_null';
    }

    public function message(): string
    {
        return 'Value cannot be <Null>';
    }
}
