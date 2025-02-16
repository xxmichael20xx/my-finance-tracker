<?php

namespace Database\Seeders;

use App\Enum\RolesAndPermissionEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DefaultAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Create default admin user
        $adminEmail = 'admin@domain.com';
        $userData = [
            'first_name' => 'Admin',
            'last_name' => 'Dev',
            'email' => $adminEmail,
            'password' => 'admin123',
            'email_verified_at' => now()
        ];

        $user = User::query()->firstOrCreate(
            [
                'email' => $adminEmail
            ],
            $userData
        );

        $adminRole = Role::findByName(RolesAndPermissionEnum::ADMIN_ROLE);
        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
