<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class EmployeesSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create();
        $companies = Company::all();

        foreach ($companies as $company) {

            foreach ($company->departments as $department) {

                foreach ($department->designations as $designation) {
                    for ($i = 0; $i < 3; $i++) {
                        Employee::create([
                            'designation_id' => $designation->id,
                            'name' => $faker->firstName(),
                            'email' => $faker->unique()->safeEmail,
                            'phone' => $faker->phoneNumber,
                            'address' => $faker->address,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
            }
        }
    }
}
