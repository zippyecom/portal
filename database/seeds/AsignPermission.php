<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AsignPermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create permissions
        Permission::create(['name' => 'is_admin']);
        Permission::create(['name' => 'add_user']);

        // create roles and assign permissions
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(['is_admin', 'add_user']);

        $role = Role::create(['name' => 'customer']);
        $role = Role::create(['name' => 'operation']);
        $role = Role::create(['name' => 'account']);
        $role = Role::create(['name' => 'rider']);
        $role = Role::create(['name' => 'metro']);



        // For inserting multiple permissions
        // $PermissionNames = ['writer', 'editor'];
        // $permissions = collect($PermissionNames)->map(function ($permission) {
        // return ['name' => $permission, 'guard_name' => 'web'];
        // });
        // Permission::insert($permissions->toArray());

        // End inserting multiple permissions
    }
}
