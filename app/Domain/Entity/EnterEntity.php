<?php

namespace App\Domain\Entity;

use App\Models\User;

class EnterEntity
{
    public function __construct(
        public User $user,
        public string $token
    )
    {
    }
}
