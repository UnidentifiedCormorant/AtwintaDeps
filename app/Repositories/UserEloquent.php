<?php

namespace App\Repositories;

use App\Domain\DTO\FindWorkerData;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
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

    public function getUserById(string $id): User
    {
        /** @var Builder $builder */
        $builder = $this->makeModel();

        return $builder->find($id);
    }

    public function getUserByToken(string $token): User|null
    {
//        /** @var Builder $builder */
//        $builder = $this->makeModel();
//
//        dd($token);
//
//        return $builder->where('remember_token', $token)->first();
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|Collection
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function getAllUsers(): LengthAwarePaginator
    {
        /** @var Builder $builder */
        $builder = $this->makeModel();

        return $builder->paginate(10);
    }

    public function getFilteredUsers(FindWorkerData $data): LengthAwarePaginator
    {
        //Здесь я бы плясал через билдер и when который по сути if внутри запроса, я бы им проверял имеется не нулловый ли параметр в дтохе и если нет - протягивал бы where
    }
}
