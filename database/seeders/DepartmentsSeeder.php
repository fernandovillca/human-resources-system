<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentsSeeder extends Seeder
{
    public function run(): void
    {
        $companies = Company::all();

        foreach ($companies as $company) {
            $departments = $company->departments()->createMany([
                ['name' => 'Recursos Humanos'],
                ['name' => 'Finanzas'],
                ['name' => 'Ingeniería'],
                ['name' => 'Mercadotecnia'],
            ]);


            foreach ($departments as $department) {
                switch ($department->name) {
                    case 'Recursos Humanos':
                        $designations = [
                            'Gerente de Recursos Humanos',
                            'Especialista en Reclutamiento',
                            'Coordinador de Capacitación',
                        ];
                        break;
                    case 'Finanzas':
                        $designations = [
                            'Analista Financiero',
                            'Contador',
                            'Auditor Interno',
                        ];
                        break;
                    case 'Ingeniería':
                        $designations = [
                            'Desarrollador de Software',
                            'Ingeniero de DevOps',
                            'Arquitecto de Soluciones',
                        ];
                        break;
                    case 'Mercadotecnia':
                        $designations = [
                            'Gerente de Marketing',
                            'Especialista en SEO',
                            'Coordinador de Contenido',
                        ];
                        break;
                    default:
                        $designations = [];
                        break;
                }

                foreach ($designations as $designationName) {
                    $department->designations()->create(['name' => $designationName]);
                }
            }
        }
    }
}
