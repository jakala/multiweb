<?php

declare(strict_types=1);

namespace App\Shared\Domain\ValueObject;

use App\Shared\Domain\Exception\InvalidNumber;

class Number implements ValueObject
{
    public function __construct(protected mixed $value)
    {
        $this->validateIsNumber($value);
    }

    public function value(): mixed
    {
        return $this->value;
    }

    private function validateIsNumber(mixed $value): void
    {
        if (!is_numeric($value)) {
            throw new InvalidNumber($value);
        }
    }
}
