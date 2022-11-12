<?php

declare(strict_types=1);

namespace App\Shared\Domain\Exception;

abstract class DomainError extends \DomainException implements Exception
{
    public function __construct()
    {
        parent::__construct($this->message());
    }

    abstract protected function code(): string;

    abstract protected function message(): string;
}
