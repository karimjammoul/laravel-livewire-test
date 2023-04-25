<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            [
                'name' => 'Technology'
            ],
            [
                'name' => 'Marketing'
            ],
            [
                'name' => 'Finance'
            ],
            [
                'name' => 'QA'
            ],
        ];

        Department::truncate();
        Department::insert($departments);

    }
}
