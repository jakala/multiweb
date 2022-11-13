<?php

namespace App\Shared\Infrastructure;

use App\Shared\Domain\ValueObject\ProviderCache;
use Predis\Client;

class RedisProviderCache implements ProviderCache
{
    private Client $client;

    public function __construct(string $redisScheme, string $redisHost, string $redisPort)
    {
        $this->client = new Client(['scheme' => $redisScheme, 'host' => $redisHost, 'port' => $redisPort]);
    }
    public function get(string $key)
    {
        return $this->client->get($key);
    }

    public function has(string $key): bool
    {
        return \boolval($this->client->exists($key));
    }

    public function set(string $key, mixed $value, int $ttl): void
    {
        $this->client->set($key, $value, 'ex', $ttl);
    }

    public function del(string $key): void
    {
        $this->client->del($key);
    }
}
