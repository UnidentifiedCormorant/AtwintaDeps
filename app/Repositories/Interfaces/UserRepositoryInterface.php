<?php

namespace App\Repositories\Interfaces;

use App\Models\User;
use Prettus\Repository\Contracts\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function getUserByEmail(string $email): User|null;
}
