<?php

namespace App\Infrastructure\Controller;

use App\Domain\ValueObject\GirlRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class HomeController
{
    public function __construct(
        readonly GirlRepository $inMemoryGirlRepository
    ) {
    }
    public function __invoke(): JsonResponse
    {
        $girls = $this->inMemoryGirlRepository->findAll();
        return new JsonResponse($girls);
    }
}
