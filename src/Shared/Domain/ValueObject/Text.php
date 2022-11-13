<?php

namespace App\Shared\Domain\ValueObject;

class Text implements ValueObject
{
    public function __construct(protected string $value)
    {
    }

    public function value(): string
    {
        return $this->value;
    }
}
