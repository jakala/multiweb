<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

interface GirlRepository
{
    public function findAll(): Girls;
}
