<?php

namespace App\Services\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface DepartmentServiceInterface
{
    public function getAllDepartments(): Collection;
}
