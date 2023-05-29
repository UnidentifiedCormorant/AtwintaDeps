<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Prettus\Repository\Contracts\RepositoryInterface;

interface DepartmentRepositoryInterface extends RepositoryInterface
{
    public function getAllDepartments(): Collection;
}
