<?php

declare(strict_types=1);

namespace App\Shared\Domain\ValueObject;

interface ValueObject
{
    public function value(): mixed;
}
