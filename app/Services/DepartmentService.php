<?php

namespace App\Services;

use App\Repositories\Interfaces\DepartmentRepositoryInterface;
use App\Services\Interfaces\DepartmentServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class DepartmentService implements DepartmentServiceInterface
{
    public function __construct(
        public DepartmentRepositoryInterface $departmentRepository
    )
    {
    }

    public function getAllDepartments(): Collection
    {
        return $this->departmentRepository->getAllDepartments();
    }
}
