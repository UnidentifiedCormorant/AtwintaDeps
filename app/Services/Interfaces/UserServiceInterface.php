<?php

namespace App\Services\Interfaces;

use App\Domain\DTO\RegisterData;
use App\Domain\Entity\RegisterEntity;

interface UserServiceInterface
{
    public function store(RegisterData $data): RegisterEntity;
}
