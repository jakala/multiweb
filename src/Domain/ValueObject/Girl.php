<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

final class Girl implements \JsonSerializable
{
    public function __construct(
        public readonly Nick $nick,
        public readonly Permalink $link,
        public readonly Birthdate $birthdate,
        public readonly Height $height,
        public readonly Thumbnail $thumbnail1,
        public readonly Thumbnail $thumbnail2,
        public readonly Thumbnail $thumbnail3,
        public readonly Thumbnail $thumbnail4
    ) {
    }

    public function jsonSerialize(): array
    {
        return [
            'nick' => $this->nick->value(),
            'permalink' => $this->link->value(),
            'birthdate' => $this->birthdate->__toString(),
            'height' => $this->height->value(),
            'thumb1' => $this->thumbnail1->value(),
            'thumb2' => $this->thumbnail2->value(),
            'thumb3' => $this->thumbnail3->value(),
            'thumb4' => $this->thumbnail4->value(),
        ];
    }
}
