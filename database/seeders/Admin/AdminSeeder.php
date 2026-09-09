<?php

namespace Database\Seeders\Admin;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a super admin user
        $admin = new Admin();
        $admin->name = 'SUPER ADMIN';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('1234');
        $admin->save();

        // Create the "Super Admin" role
        Role::create(['name' => 'Super Admin', 'guard_name' => 'admin']);

        // Assign the "Super Admin" role to the user
        $admin->assignRole('Super Admin');
    }
}
