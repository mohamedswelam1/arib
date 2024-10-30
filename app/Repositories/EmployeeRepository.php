<?php

namespace App\Repositories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Collection;

class EmployeeRepository
{
    public function getAllWithManagers(): Collection
    {
        return Employee::where('manager_id',auth()->user()->id)->get();
    }

    public function searchEmployees(string $searchTerm): Collection
    {
        return Employee::query()
            ->where('first_name', 'LIKE', "%{$searchTerm}%")
            ->orWhere('last_name', 'LIKE', "%{$searchTerm}%")
            ->orWhereHas('manager', function ($query) use ($searchTerm) {
                $query->where('first_name', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('last_name', 'LIKE', "%{$searchTerm}%");
            })
            ->get();
    }

    public function create(array $data): Employee
    {
        return Employee::create($data);
    }

    public function update(Employee $employee, array $data): bool
    {
        return $employee->update($data);
    }

    public function delete(Employee $employee): bool
    {
        return $employee->delete();
    }
}
