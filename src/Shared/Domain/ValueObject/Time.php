<?php

declare(strict_types=1);

namespace App\Shared\Domain\ValueObject;

use App\Shared\Domain\Exception\InvalidNull;
use DateTime;

class Time implements ValueObject
{
    protected const DEFAULT_FORMAT = 'Y-m-d';

    private function __construct(protected ?DateTime $value)
    {
        $this->validateNullable($value);
    }

    public static function createFromString(string $datetime): self
    {
        $value = DateTime::createFromFormat(self::DEFAULT_FORMAT, $datetime);
        return new self($value);
    }

    public function value(): mixed
    {
        return $this->value;
    }

    private function validateNullable(?DateTime $value): void
    {
        if (is_null($value)) {
            throw new InvalidNull();
        }
    }
}
