<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $permissions = [
            // 'role-list',
            // 'role-create',
            // 'role-edit',
            // 'role-delete',

            // 'plan-list',
            // 'plan-create',
            // 'plan-delete',

            'user-list',
            'user-create',
            'user-edit',
            'user-password',
            'user-delete',

            'coefficient-list',
            'coefficient-edit',

            'tax-list',
            'tax-create',
            'tax-edit',
            'tax-delete'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
