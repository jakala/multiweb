<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

use App\Domain\Exception\InvalidThumbnail;
use App\Shared\Domain\ValueObject\Text;

class Thumbnail extends Text
{
    public function __construct(string $value)
    {
        $this->validate($value);
        self::__construct($value);
    }

    private function validate(string $value): void
    {
        if (!str_ends_with($value, '.jpg')) {
            throw new InvalidThumbnail($value);
        }
    }
}
