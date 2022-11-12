<?php

namespace App\Infrastructure\Repository;

use App\Application\Service\ArrayToGirls;
use App\Domain\ValueObject\Girls;
use App\Domain\ValueObject\GirlRepository;
use App\Infrastructure\Exception\ReadGirlsError;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class CumlouderGirlRepository implements GirlRepository
{
    private const PROVIDER = 'cumlouder';

    public function __construct(
        private readonly HttpClientInterface $client,
        private readonly string $webcamsUri,
        private readonly ArrayToGirls $convertArrayToGirls
    ) {
    }

    public function findAll(): Girls
    {
        try {
            $response = $this->client->request(
                'GET',
                $this->webcamsUri
            );

            $statusCode = $response->getStatusCode();
            $content = $response->toArray();
        } catch (TransportExceptionInterface $e) {
            throw new ReadGirlsError(self::PROVIDER, $e->getMessage());
        }

        return $this->convertArrayToGirls->__invoke($content);
    }
}
