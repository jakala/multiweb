<?php

namespace App\Infrastructure\Exception;

use App\Shared\Domain\Exception\DomainError;

class ReadGirlsError extends DomainError
{
    public function __construct(
        private string $provider,
        private string $externalMessage
    ) {
    }

    protected function code(): string
    {
        return 'read_girls_exception';
    }

    protected function message(): string
    {
        return sprintf(
            'Error reading girls from <%s> provider. Message: "%s"',
            $this->provider,
            $this->externalMessage
        );
    }
}