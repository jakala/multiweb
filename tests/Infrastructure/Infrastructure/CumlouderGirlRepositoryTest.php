<?php

namespace App\Tests\Infrastructure\Infrastructure;

use App\Application\Service\ArrayToGirls;
use App\Domain\ValueObject\Girls;
use App\Infrastructure\Repository\CumlouderGirlRepository;
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
        $provider = new CumlouderGirlRepository($client, $uri, $convertArrayToGirls);

        $results = $provider->findAll();

        $this->assertInstanceOf(Girls::class, $results);
    }
}
