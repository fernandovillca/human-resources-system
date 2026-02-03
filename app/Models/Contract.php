<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'employee_id',
        'designation_id',
        'start_date',
        'end_date',
        'rate_type',
        'rate',
    ];
}
