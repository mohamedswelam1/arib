<?php

namespace App\Repositories;

use App\Models\Department;

class DepartmentRepository
{
    /**
     * Get all departments.
     */
    public function getAll()
    {
        return Department::all();
    }

    /**
     * Search for departments by name.
     */
    public function searchByName(string $search)
    {
        return Department::where('name', 'like', '%' . $search . '%')
            ->withCount('employees')
            ->withSum('employees', 'salary')
            ->get();
    }

    /**
     * Create a new department.
     */
    public function create(array $data)
    {
        return Department::create($data);
    }

    /**
     * Update an existing department.
     */
    public function update(Department $department, array $data)
    {
        return $department->update($data);
    }

    /**
     * Delete a department if it has no employees.
     */
    public function delete(Department $department): bool
    {
        if ($department->employees()->exists()) {
            return false;
        }

        return $department->delete();
    }
}
