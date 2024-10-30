<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employees\StoreEmployeeRequest;
use App\Http\Requests\Employees\UpdateEmployeeRequest;
use App\Models\Department;
use App\Models\Employee;
use App\Services\EmployeeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function index(): View
    {
        $employees = $this->employeeService->getEmployeesWithManagers();
        return view('employees.index', compact('employees'));
    }

    public function create(): View
    {
        $departments = Department::with('manager')->get();
        return view('employees.create', compact('departments'));
    }

    public function store(StoreEmployeeRequest $request): RedirectResponse
    {
        try {
            $this->employeeService->createEmployee($request->validated(), $request->file('image'));

            return redirect()->route('employees')->with('success', 'Employee created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'There was an error processing your request.');
        }
    }

    public function searchEmployee(Request $request): View
    {
        $employees = $this->employeeService->searchEmployees($request->input('search'));
        return view('employees.index', compact('employees'));
    }

    public function edit(Employee $employee): View
    {
        $departments = Department::get();
        return view('employees.edit', compact('employee', 'departments'));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee): RedirectResponse
    {
        try {
            $this->employeeService->updateEmployee($employee, $request->validated(), $request->file('image'));

            return redirect()->route('employees')->with('success', 'Employee updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'There was an error processing your request.');
        }
    }

    public function destroy(Employee $employee): RedirectResponse
    {
        $this->employeeService->deleteEmployee($employee);
        return redirect()->route('employees')->with('success', 'Employee deleted successfully.');
    }
}
