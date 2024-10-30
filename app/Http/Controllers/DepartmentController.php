<?php

namespace App\Http\Controllers;

use App\Http\Requests\Departments\StoreDepartmentRequest;
use App\Http\Requests\Departments\UpdateDepartmentRequest;
use App\Models\Department;
use App\Services\DepartmentService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected DepartmentService $service;

    public function __construct(DepartmentService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $departments = $this->service->getAllDepartments();
        return view('departments.index', compact('departments'));
    }

    /**
     * Search for a department by name.
     */
    public function searchDepartment(Request $request): View
    {
        $departments = $this->service->searchDepartments($request->get('search'));
        return view('departments.search', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request): RedirectResponse
    {
        $this->service->createDepartment($request->validated());
        return redirect()->route('departments')->with('success', 'Department created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department): View
    {
        return view('departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, Department $department): RedirectResponse
    {
        $this->service->updateDepartment($department, $request->validated());
        return redirect()->route('departments')->with('success', 'Department updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department): RedirectResponse
    {
        if (!$this->service->deleteDepartment($department)) {
            return redirect()->back()->with('error', 'Department cannot be deleted because it has employees assigned to it.');
        }

        return redirect()->route('departments')->with('success', 'Department deleted successfully.');
    }
}
