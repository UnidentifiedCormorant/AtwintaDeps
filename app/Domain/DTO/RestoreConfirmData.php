<?php

namespace App\Domain\DTO;

use App\Domain\Enum\Type;
use Atwinta\DTO\DTO;

class RestoreConfirmData extends DTO
{
    public function __construct(
        public string $token,
        public string $password,
    )
    {
    }
}
