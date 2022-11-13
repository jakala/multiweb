<?php

namespace App\Infrastructure\Controller;

use App\Domain\ValueObject\GirlRepository;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class HomeController
{
    public function __construct(
        readonly GirlRepository $cumlouderGirlRepository,
        readonly Environment $twig
    ) {
    }
    public function __invoke(): Response
    {
        $template = '/base.html.twig';
        $list = $this->cumlouderGirlRepository->findAll();
        return new Response($this->twig->render($template, ['list' => $list->girls]));
    }
}
