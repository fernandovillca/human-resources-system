<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'designation_id',
        'name',
        'email',
        'phone',
        'address',
    ];
}
