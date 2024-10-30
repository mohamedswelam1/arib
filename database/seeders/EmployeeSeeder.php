<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Employee;
use Database\Factories\DepartmentFactory;
use Database\Factories\EmployeeFactory;
use Database\Factories\ManagerFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $firstDepartment = Department::factory()->create();
        $secondDepartment = Department::factory()->create();

        $firstManager = Employee::factory()->create([
            'email' => 'arib@email.com',
            'phone' => '1234567890',
            'department_id' => $firstDepartment->id,
        ]);
        $secondManager = Employee::factory()->create([
            'department_id' => $secondDepartment->id,
        ]);

        Employee::factory()->count(5)->create([
            'manager_id' => $firstManager->id,
            'department_id' => $firstDepartment->id,
        ]);

        Employee::factory()->count(5)->create([
            'manager_id' => $secondManager->id,
            'department_id' => $secondDepartment->id,
        ]);
    }
}
