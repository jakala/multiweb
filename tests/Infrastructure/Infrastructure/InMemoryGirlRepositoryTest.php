<?php

declare(strict_types=1);

namespace App\Tests\Infrastructure\Infrastructure;

use App\Application\Service\ArrayToGirls;
use App\Domain\ValueObject\Girls;
use App\Infrastructure\Repository\InMemoryGirlRepository;
use PHPUnit\Framework\TestCase;

class InMemoryGirlRepositoryTest extends TestCase
{
    /** @test */
    public function checkFindAllGirlsResultsFromInMemoryProvider(): void
    {
        $convertArrayToGirls = new ArrayToGirls();
        $provider = new InMemoryGirlRepository($convertArrayToGirls);

        $list = $provider->findAll();

        $this->assertInstanceOf(Girls::class, $list);
    }
}
