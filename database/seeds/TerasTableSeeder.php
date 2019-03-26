<?php

namespace Iskandarali\Teras\database\seeds;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use App\User;

class TerasTableSeeder extends Seeder
{
	public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'add users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'coordinator']);
        $role->givePermissionTo('view users');

        // or may be done by chaining
        $role = Role::create(['name' => 'moderator'])
            ->givePermissionTo(['add users', 'view users', 'edit users', 'delete users']);

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
        ]);

        $user->assignRole('admin');
    }
}