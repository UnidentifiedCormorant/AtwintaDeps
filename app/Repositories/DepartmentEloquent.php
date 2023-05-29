<?php

namespace App\Repositories;

use App\Models\Department;
use App\Repositories\Interfaces\DepartmentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\Builder;
use Prettus\Repository\Eloquent\BaseRepository;

class DepartmentEloquent extends BaseRepository implements DepartmentRepositoryInterface
{
    public function model()
    {
        return Department::class;
    }

    public function getAllDepartments(): Collection
    {
        /** @var Builder $builder */
        $builder = $this->makeModel();

        return $builder->all();
    }
}
