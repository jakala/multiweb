<?php

namespace App\Domain\ValueObject;

final class Girls
{
    /** @var Girl ...$girls */
    public readonly array $girls;

    public function __construct(Girl ...$girls)
    {
        $this->girls = $girls;
    }
}
