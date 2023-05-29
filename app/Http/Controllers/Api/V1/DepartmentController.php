<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Department\DepartmentRecourse;
use App\Services\Interfaces\DepartmentServiceInterface;

class DepartmentController extends Controller
{
    public function __construct(
        public DepartmentServiceInterface $departmentService
    )
    {
    }

    /**
     * Возвращает вес отделы и профессии, входящие в эти отделы
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function Departments()
    {
        return DepartmentRecourse::collection($this->departmentService->getAllDepartments());
    }
}
