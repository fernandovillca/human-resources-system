<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContractsSeeder extends Seeder
{
    public function run(): void
    {
        $employees = Employee::all();
        foreach ($employees as $employee) {
            $employee->contracts()->create([
                'designation_id' => $employee->designation_id,
                'rate_type' => 'mensual',
                'start_date' => now(),
                'end_date' => now()->addYear(),
                'rate' => 6000,
            ]);
        }
    }
}
