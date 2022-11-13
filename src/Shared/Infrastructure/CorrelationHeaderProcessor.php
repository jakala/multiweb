<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure;

use Monolog\LogRecord;

final class CorrelationHeaderProcessor
{
    private ?string $token = null ;
    private ?int $count = null ;
    private float $start;

    public function __invoke(LogRecord $record): LogRecord
    {
        if (null === $this->token) {
            $this->start = microtime(true);
            $this->token = uniqid('', false);
            $this->count = 0;
        }
        $this->count++;
        $add['token'] = $this->token;
        $add['index'] = $this->count;
        $duration = microtime(true) - $this->start;
        $add['duration'] = $duration;
        $record->extra = $add;

        return $record;
    }

    public function token(): ?string
    {
        return $this->token;
    }

    public function count(): ?int
    {
        return $this->count;
    }
}
