<?php

namespace App\Infrastructure\Controller;

use App\Domain\ValueObject\GirlRepository;
use App\Infrastructure\Exception\WebInvalid;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class HomeController
{
    public function __construct(
        readonly GirlRepository $cumlouderGirlRepository,
        readonly Environment $twig,
        readonly array $webs
    ) {
    }
    public function __invoke(Request $request): Response
    {
        $host = $request->server->get('HTTP_HOST');
        $web = $this->validate($host);
        $template = '/base.html.twig';
        $list = $this->cumlouderGirlRepository->findAll();
        return new Response($this->twig->render($template, ['list' => $list->girls, 'site' => $web]));
    }

    private function validate(string $host): array
    {
        $found = array_filter(
            $this->webs,
            fn($web) => $web['url'] == $host,
        );

        if (empty($found)) {
            throw new WebInvalid($host);
        }

        $keys = array_keys($found);
        return $found[$keys[0]];
    }
}
