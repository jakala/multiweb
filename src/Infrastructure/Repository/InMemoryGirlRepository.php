<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Application\Service\ArrayToGirls;
use App\Domain\ValueObject\GirlRepository;
use App\Domain\ValueObject\Girls;

class InMemoryGirlRepository implements GirlRepository
{
    public function __construct(private readonly ArrayToGirls $convertArrayToGirls)
    {
    }

    public function findAll(): Girls
    {
        $girls = [
            [
                "wbmerNick" => "Cristina Cumlouder",
                "wbmerPermalink" => "cristina-cumlouder",
                "wbmerBirthdate" => "1997-01-01",
                "wbmerHeight" => "155",
                "wbmerThumb1" => "9c483c781c21a5f51e9c6697409c23c0.jpg",
                "wbmerThumb2" => "debc64c94cdaf10b777d0d330f45f7b0.jpg",
                "wbmerThumb3" => "af457a5567437cca8968c3b78aeb3266.jpg",
                "wbmerThumb4" => "118c5f346cf5a7be01ad916f93295e77.jpg",
                "wbmerLastLogin" => "2022-11-12 16=>26=>32"
            ],
            [
                "wbmerNick" => "Angel Estefany",
                "wbmerPermalink" => "angel-estefany",
                "wbmerBirthdate" => "1994-08-03",
                "wbmerHeight" => "171",
                "wbmerThumb1" => "575a538139ebff8d7982d241ba458e47.jpg",
                "wbmerThumb2" => "1d7df0cf7c65128a8c5111519a4cc307.jpg",
                "wbmerThumb3" => "0caab4febeac9bbcd1f08360659efeb4.jpg",
                "wbmerThumb4" => "b576d5e20db998422477776aa81bd3c5.jpg",
                "wbmerLastLogin" => "2022-11-12 16=>26=>32",
            ],
            [
                "wbmerNick" => "Lila Barcelona",
                "wbmerPermalink" => "lila-barcelona",
                "wbmerBirthdate" => "1993-01-01",
                "wbmerHeight" => "161",
                "wbmerThumb1" => "c2bb38355913612dd040b7e4854e8bd0.jpg",
                "wbmerThumb2" => "1d4a8b012cfb7888bfe6855834bdac26.jpg",
                "wbmerThumb3" => "b1645829ee0f4cfe7589d0e4828fba09.jpg",
                "wbmerThumb4" => "ea4769347003b566d713a3c2ba4b3adf.jpg",
                "wbmerLastLogin" => "2022-11-12 16=>26=>32",
            ]
        ];

        return $this->convertArrayToGirls->__invoke($girls);
    }
}
