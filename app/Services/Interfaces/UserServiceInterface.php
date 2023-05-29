<?php

namespace App\Services\Interfaces;

use App\Domain\DTO\AuthData;
use App\Domain\DTO\FindWorkerData;
use App\Domain\DTO\RegisterData;
use App\Domain\DTO\RestoreConfirmData;
use App\Domain\DTO\RestoreResponseData;
use App\Domain\Entity\EnterEntity;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserServiceInterface
{
    public function store(RegisterData $data): EnterEntity;

    public function auth(AuthData $data): EnterEntity;

    public function clearPassword(RestoreResponseData $data): string;

    public function restorePassword(RestoreConfirmData $data): void;

    public function getAllUsers(): LengthAwarePaginator;

    public function getFilteredUsers(FindWorkerData $data): LengthAwarePaginator;
}
