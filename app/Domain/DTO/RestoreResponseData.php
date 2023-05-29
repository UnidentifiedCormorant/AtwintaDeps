<?php

namespace App\Domain\DTO;

use App\Domain\Enum\Type;
use Atwinta\DTO\DTO;

class RestoreResponseData extends DTO
{
    public function __construct(
        public string $email,
    )
    {
    }
}
