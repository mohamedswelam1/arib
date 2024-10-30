<?php

namespace App\Services;

use App\Models\Employee;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class EmployeeService
{
    protected $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function getEmployeesWithManagers()
    {
        return $this->employeeRepository->getAllWithManagers();
    }

    public function searchEmployees(string $searchTerm)
    {
        return $this->employeeRepository->searchEmployees($searchTerm);
    }

    public function createEmployee(array $data, ?UploadedFile $image = null)
    {
        if ($image) {
            $data['image'] = $this->uploadImage($image);
        }

        return $this->employeeRepository->create($data);
    }

    public function updateEmployee(Employee $employee, array $data, ?UploadedFile $image = null)
    {
        if ($image) {
            $this->deleteImage($employee->image);
            $data['image'] = $this->uploadImage($image);
        }

        return $this->employeeRepository->update($employee, $data);
    }

    public function deleteEmployee(Employee $employee)
    {
        $this->deleteImage($employee->image);
        return $this->employeeRepository->delete($employee);
    }

    protected function uploadImage(UploadedFile $image): string
    {
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->storeAs('images', $imageName);

        return $imageName;
    }

    protected function deleteImage(?string $imageName)
    {
        if ($imageName) {
            Storage::delete('images/' . $imageName);
        }
    }
}
