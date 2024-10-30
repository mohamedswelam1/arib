<?php

namespace App\Http\Controllers;

use App\Enums\TaskStatus;
use App\Http\Requests\Tasks\StoreTaskRequest;
use App\Http\Requests\Tasks\UpdateTaskRequest;
use App\Models\Employee;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        $employee = auth()->user();
        $tasks = $this->taskService->getTasksForUser($employee->id);
        
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        $employees = Employee::where('manager_id', auth()->user()->id)->get();
        $statuses = TaskStatus::cases();
        
        return view('tasks.create', compact(['employees', 'statuses']));
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreTaskRequest $request
     * @return RedirectResponse
     */
    public function store(StoreTaskRequest $request): RedirectResponse
    {
        $this->taskService->createTask($request->validated());

        return redirect()->route('tasks')->with('success', 'Task created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task): View
    {
        $employees = Employee::where('manager_id', auth()->user()->id)->get();
        $statuses = TaskStatus::cases();
        
        return view('tasks.edit', compact(['task', 'employees', 'statuses']));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateTaskRequest $request
     * @param Task $task
     * @return RedirectResponse
     */
    public function update(UpdateTaskRequest $request, Task $task): RedirectResponse
    {
        $this->taskService->updateTask($task, $request->validated());

        return redirect()->route('tasks')->with('success', 'Task updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     * @param Task $task
     * @return RedirectResponse
     */
    public function destroy(Task $task): RedirectResponse
    {
        $this->taskService->deleteTask($task);

        return redirect()->route('tasks')->with('success', 'Task deleted successfully!');
    }
}
