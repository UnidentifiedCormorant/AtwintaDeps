<?php

namespace App\Domain\Enum;

enum Type: string
{
    const Front = 'front';
    const Back = 'back';

//    public function title(): string
//    {
//        return match ($this) {
//            Type::Front => 'back',
//            Type::Back => 'front',
//        };
//    }
}
