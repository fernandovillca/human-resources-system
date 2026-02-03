<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = [
        'payroll_id',
        'employee_id',
        'gross_salary',
    ];
}
