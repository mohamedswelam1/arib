<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository
{
    public function getAllTasksForUser($userId)
    {
        return Task::where('created_by', $userId)
            ->orWhere('employee_id', $userId)
            ->get();
    }

    public function createTask(array $data): Task
    {
        return Task::create($data);
    }

    public function updateTask(Task $task, array $data): bool
    {
        return $task->update($data);
    }

    public function deleteTask(Task $task): bool
    {
        return $task->delete();
    }

    public function findTaskById($id): ?Task
    {
        return Task::find($id);
    }
}
