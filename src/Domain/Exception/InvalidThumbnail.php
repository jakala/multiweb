<?php

namespace App\Domain\Exception;

use App\Shared\Domain\Exception\DomainError;

class InvalidThumbnail extends DomainError
{
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    protected function code(): string
    {
        return 'invalid_thumbnail';
    }

    protected function message(): string
    {
        return sprintf('Value <%s> is not a valid Thumbnail.', $this->value);
    }
}
