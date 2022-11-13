<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

use App\Shared\Domain\ValueObject\Time;
use DateTime;

class Birthdate extends Time implements \Stringable
{
    public static function createFromString(string $datetime): self
    {
        $value = DateTime::createFromFormat(self::DEFAULT_FORMAT, $datetime);
        return new self($value);
    }

    public function __toString()
    {
        return $this->value->format(self::DEFAULT_FORMAT);
    }
}
