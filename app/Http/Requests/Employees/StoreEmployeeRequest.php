<?php

namespace App\Http\Requests\Employees;

use App\Models\Department;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:employees,email'],
            'phone' => ['required', 'numeric'],
            'password' => ['required', Password::min(8)->numbers()->letters()->mixedCase()->symbols()],
            'password_confirmation' => ['required', 'same:password'],
            'salary' => ['required', 'numeric'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'manager_id' => ['nullable', 'exists:employees,id'],
            'department_id' => ['required', 'exists:departments,id'],
        ];
    }

}
