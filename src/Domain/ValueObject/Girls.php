<?php

namespace App\Domain\ValueObject;

final class Girls
{
    /** @var Girl ...$girls */
    public readonly array $girls;

    private function __construct(Girl ...$girls)
    {
        $this->girls = $girls;
    }
}
