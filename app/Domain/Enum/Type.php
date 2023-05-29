<?php

namespace App\Domain\Enum;

enum Type: string
{
    case FRONT = 'front';
    case BACK = 'back';

//    public function title(): int
//    {
//        return match ($this) {
//            Type::FRONT => 1,
//            Type::BACK => 2,
//        };
//    }
}
