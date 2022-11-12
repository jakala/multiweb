<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

final class Girl
{
    public function __construct(
        public readonly Nick $nick,
        public readonly Permalink $link,
        public readonly Birthdate $birthdate,
        public readonly Height $height,
        public readonly Width $width,
        public readonly Thumbnail $thumbnail1,
        public readonly Thumbnail $thumbnail2,
        public readonly Thumbnail $thumbnail3,
        public readonly Thumbnail $thumbnail4
    ) {
    }
}
