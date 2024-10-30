<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $department = Department::factory()->create() ;

        return [
            'name' => $this->faker->unique()->word(),
            'description' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['pending', 'in_progress', 'done']),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'employee_id' => Employee::factory()->create([
                'department_id' => $department,
            ]),
            'created_by' => Employee::factory()->create([
                'manager_id' => null,
                'department_id' => $department,
            ]),
        ];
    }
}
