<?php

namespace Database\Seeders;

use App\Enum\RolesAndPermissionEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rolesAndPermissions = RolesAndPermissionEnum::all();

        foreach ($rolesAndPermissions as $roleName => $permissions) {
            // Create Role
            $role = Role::query()->firstOrCreate(['name' => $roleName]);

            // Create permissions
            foreach ($permissions as $permission) {
                Permission::query()->firstOrCreate(['name' => $permission]);
            }

            $role->syncPermissions($permissions);
        }
    }
}
