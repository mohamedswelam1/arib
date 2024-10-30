<?php

namespace App\Services;

use App\Models\Department;
use App\Repositories\DepartmentRepository;

class DepartmentService
{
    protected DepartmentRepository $repository;

    public function __construct(DepartmentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllDepartments()
    {
        return $this->repository->getAll();
    }

    public function searchDepartments(string $search)
    {
        return $this->repository->searchByName($search);
    }

    public function createDepartment(array $data)
    {
        return $this->repository->create($data);
    }

    public function updateDepartment(Department $department, array $data)
    {
        return $this->repository->update($department, $data);
    }

    public function deleteDepartment(Department $department): bool
    {
        return $this->repository->delete($department);
    }
}
