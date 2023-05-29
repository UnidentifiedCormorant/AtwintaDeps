<?php

namespace App\Repositories\Interfaces;

use App\Domain\DTO\FindWorkerData;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Prettus\Repository\Contracts\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function getUserByEmail(string $email): User|null;

    public function getUserById(string $id): User;

    public function getUserByToken(string $token): User|null;

    public function getAllUsers(): LengthAwarePaginator;

    public function getFilteredUsers(FindWorkerData $data): LengthAwarePaginator;
}
