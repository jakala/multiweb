<?php

namespace App\Application\Service;

use App\Domain\ValueObject\Birthdate;
use App\Domain\ValueObject\Girl;
use App\Domain\ValueObject\Girls;
use App\Domain\ValueObject\Height;
use App\Domain\ValueObject\Nick;
use App\Domain\ValueObject\Permalink;
use App\Domain\ValueObject\Thumbnail;
use App\Domain\ValueObject\Width;

class ArrayToGirls
{
    public function __invoke(array $girls): Girls
    {
        $girlList = array_map(
            fn(array $item): Girl => $this->itemToGirl($item),
            $girls
        );
        return new Girls(...$girlList);
    }

    private function itemToGirl(array $item): Girl
    {
        return new Girl(
            new Nick($item['wbmerNick']),
            new Permalink($item['wbmerPermalink']),
            Birthdate::createFromString($item['wbmerBirthdate']),
            new Height($item['wmberHeight']),
            new Width($item['wmberWidth']),
            new Thumbnail($item['wbmerThumbnail1']),
            new Thumbnail($item['wbmerThumbnail2']),
            new Thumbnail($item['wbmerThumbnail3']),
            new Thumbnail($item['wbmerThumbnail4'])
        );
    }
}
