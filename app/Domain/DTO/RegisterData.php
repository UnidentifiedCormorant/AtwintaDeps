<?php

namespace App\Domain\DTO;

use Atwinta\DTO\DTO;

class RegisterData extends DTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $type,
        public string $github,
        public string $city,
        public string $phone,
        public string $birthday,
    )
    {
    }
}
