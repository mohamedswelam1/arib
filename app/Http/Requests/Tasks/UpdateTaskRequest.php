<?php

namespace App\Http\Requests\Tasks;

use App\Enums\TaskStatus;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'employee_id' => ['nullable', 'exists:employees,id'],
            'status' => ['required', 'string', 'in:' . implode(',', array_column(TaskStatus::cases(), 'value'))],
        ];
    }
}
