<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
        'start_date',
        'end_date',
        'employee_id',
        'created_by',
    ];

    /**
     * Get the employee that owns the task.
     * @return BelongsTo
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    /**
     * Get the employee that owns the task.
     * @return BelongsTo
     */
    public function manager(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'created_by');
    }
}
