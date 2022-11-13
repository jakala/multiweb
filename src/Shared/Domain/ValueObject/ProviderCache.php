<?php

declare(strict_types=1);

namespace App\Shared\Domain\ValueObject;

interface ProviderCache
{
    public function get(string $key);
    public function has(string $key): bool;
    public function set(string $key, mixed $value, int $ttl): void;
    public function del(string $key): void;
}
