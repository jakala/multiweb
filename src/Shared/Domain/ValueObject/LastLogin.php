<?php

declare(strict_types=1);

namespace App\Shared\Domain\ValueObject;

class LastLogin extends Time
{
    protected const DEFAULT_FORMAT = 'Y-m-d H:i:s';
}
