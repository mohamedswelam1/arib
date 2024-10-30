<?php

namespace App\Services;

use App\Repositories\TaskRepository;
use App\Models\Task;

class TaskService
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function getTasksForUser($userId)
    {
        return $this->taskRepository->getAllTasksForUser($userId);
    }

    public function createTask(array $data): Task
    {
        return $this->taskRepository->createTask($data);
    }

    public function updateTask(Task $task, array $data): bool
    {
        return $this->taskRepository->updateTask($task, $data);
    }

    public function deleteTask(Task $task): bool
    {
        return $this->taskRepository->deleteTask($task);
    }

    public function findTaskById($id): ?Task
    {
        return $this->taskRepository->findTaskById($id);
    }
}
