<?php

declare(strict_types=1);

namespace App\Shared\Domain\Exception;

class InvalidNumber extends DomainError
{
    public function __construct(private mixed $value)
    {
        parent::construct();
    }

    protected function code(): string
    {
        return 'invalid_number';
    }

    protected function message(): string
    {
        return sprintf('Value <%s> is not a valid number value.', $this->value);
    }
}
