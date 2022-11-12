<?php

namespace App\Infrastructure\Controller;

use App\Domain\ValueObject\GirlRepository;
use http\Client\Response;
use Twig\Environment;

class HomeController
{
    public function __construct(
        readonly GirlRepository $inMemoryGirlRepository,
//        readonly Environment $twig
    ) {
    }
    public function __invoke(): Response
    {
        $template = '';
        $list = $this->inMemoryGirlRepository->findAll();
        dd($list);
  //      return new Response($this->twig->render($template, $list->girls));
    }
}
