<?php

namespace App\Services\Interfaces;

use App\Domain\DTO\AuthData;
use App\Domain\DTO\RegisterData;
use App\Domain\Entity\EnterEntity;

interface UserServiceInterface
{
    public function store(RegisterData $data): EnterEntity;

    public function auth(AuthData $data): EnterEntity;
}
