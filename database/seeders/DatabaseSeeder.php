<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Gender;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

         \App\Models\User::create([
             'name' => 'Admin',
             'email' => 'admin@admin.com',
             'phone_number' => '0096171739279',
             'gender_id' => Gender::MALE_GENDER_ID,
             'department_id' => 1,
             'role_id' => Role::ADMIN_ROLE_ID,
             'password' => Hash::make(12345678),
         ]);

        $this->call([
            DepartmentSeeder::class,
            RoleSeeder::class,
            GenderSeeder::class,
        ]);
    }
}
