<?php

namespace App\Infrastructure\Controller;

use App\Domain\ValueObject\GirlRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class HomeController
{
    public function __construct(
        private GirlRepository $cumlouderGirlRepository
    ) {
    }
    public function __invoke(): JsonResponse
    {
        $girls = $this->cumlouderGirlRepository->findAll();
        print_r($girls); die();
        return new JsonResponse($girls);
    }
}
