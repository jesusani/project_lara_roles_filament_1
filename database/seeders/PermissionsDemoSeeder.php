<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Create some roles and permissions.

     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions

        Permission::create(['name' => 'view paciente']);

        Permission::create(['name' => 'edit pacientes']);
        Permission::create(['name' => 'delete pacientes']);
        Permission::create(['name' => 'view pacientes']);
        Permission::create(['name' => 'create pacientes']);

        Permission::create(['name' => 'edit citas']);
        Permission::create(['name' => 'delete citas']);
        Permission::create(['name' => 'view citas']);
        Permission::create(['name' => 'create citas']);

        // create roles and assign existing permissions
        $role0 = Role::create(['name' => 'user']);
        $role0->givePermissionTo('view paciente');
        $role0->givePermissionTo('view citas');

        $role1 = Role::create(['name' => 'Fisio']);
        $role1->givePermissionTo('edit pacientes');
        $role1->givePermissionTo('view pacientes');
        $role1->givePermissionTo('edit citas');
        $role1->givePermissionTo('view citas');
        $role1->givePermissionTo('create citas');
        $role1->givePermissionTo('delete citas');

        $role2 = Role::create(['name' => 'Admin']);
        $role2->givePermissionTo('create pacientes');
        $role2->givePermissionTo('delete pacientes');
        $role2->givePermissionTo('edit pacientes');
        $role2->givePermissionTo('view pacientes');
        $role2->givePermissionTo('edit citas');
        $role2->givePermissionTo('view citas');
        $role2->givePermissionTo('create citas');
        $role2->givePermissionTo('delete citas');

        // create a demo user
        $fisio = \App\Models\User::factory()->create([
            'name' => 'Example fisio',
            'email' => 'fisio@fisio.es',
        ]);
        $fisio->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Example User',
            'email' => 'user@user.es',
        ]);
        $user->assignRole($role0);

        $admin = \App\Models\User::factory()->create([
            'name' => 'Example admin',
            'email' => 'admin@admin.es',
        ]);
        $admin->assignRole($role2);

        // super admin
        Permission::create(['name' => 'assign roles']);
        $role3 = Role::create(['name' => 'Super-Admin']);
        $role3->givePermissionTo('assign roles');
        $admin = \App\Models\User::factory()->create([
            'name' => 'Admin super',
            'email' => 'super@super.es',
        ]);
        $admin->assignRole('Super-Admin');
    }
}
