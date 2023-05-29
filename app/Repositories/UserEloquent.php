<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Query\Builder;
use Prettus\Repository\Eloquent\BaseRepository;

class UserEloquent extends BaseRepository implements UserRepositoryInterface
{
    public function model()
    {
        return User::class;
    }

    public function getUserByEmail(string $email): User|null
    {
        /** @var Builder $builder */
        $builder = $this->makeModel();

        return $builder->where('email', $email)->first();
    }
}
