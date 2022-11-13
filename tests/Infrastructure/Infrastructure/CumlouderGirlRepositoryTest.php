<?php

namespace App\Tests\Infrastructure\Infrastructure;

use App\Application\Service\ArrayToGirls;
use App\Domain\ValueObject\Girls;
use App\Infrastructure\Repository\CumlouderGirlRepository;
use App\Shared\Domain\ValueObject\ProviderCache;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\HttpClient;

class CumlouderGirlRepositoryTest extends TestCase
{
    /** @test */
    public function checkFindAllGirlsResultsFromCumlouderProvider(): void
    {
        $uri = 'http://webcams.cumlouder.com/feed/webcams/online/61/1/';
        $client = HttpClient::create();
        $convertArrayToGirls = new ArrayToGirls();
        $cacheProvider = $this->createMock(ProviderCache::class);
        $provider = new CumlouderGirlRepository($client, $uri, $convertArrayToGirls, $cacheProvider);

        $results = $provider->findAll();

        $this->assertInstanceOf(Girls::class, $results);
    }
}
