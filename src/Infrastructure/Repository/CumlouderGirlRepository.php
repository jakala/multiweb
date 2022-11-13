<?php

namespace App\Infrastructure\Repository;

use App\Application\Service\ArrayToGirls;
use App\Domain\ValueObject\Girls;
use App\Domain\ValueObject\GirlRepository;
use App\Infrastructure\Exception\ReadGirlsError;
use App\Shared\Domain\ValueObject\ProviderCache;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class CumlouderGirlRepository implements GirlRepository
{
    private const KEY = 'listGirls';
    private const DURATION = 60 * 15;

    private const PROVIDER = 'cumlouder';

    public function __construct(
        private readonly HttpClientInterface $client,
        private readonly string $webcamsUri,
        private readonly ArrayToGirls $convertArrayToGirls,
        private readonly ProviderCache $redisProviderCache
    ) {
    }

    public function findAll(): Girls
    {
        if ($this->redisProviderCache->has(self::KEY)) {
            $content =  json_decode($this->redisProviderCache->get(self::KEY), true);
        } else {
            try {
                $response = $this->client->request('GET', $this->webcamsUri);
                $content = $response->toArray();
                $this->redisProviderCache->set(self::KEY, $response->getContent(), self::DURATION);
            } catch (TransportExceptionInterface $e) {
                throw new ReadGirlsError(self::PROVIDER, $e->getMessage());
            }
        }
        return $this->convertArrayToGirls->__invoke($content);
    }
}
