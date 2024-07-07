<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
         Permission::create(['name' => 'list-users']);
         Permission::create(['name' => 'store-users']);
         Permission::create(['name' => 'show-users']);
         Permission::create(['name' => 'update-users']);
         Permission::create(['name' => 'delete-users']);

         $role = Role::create(['name' => 'user']);
         $role->givePermissionTo('list-users');
         $role->givePermissionTo('show-users');
 
         $role = Role::create(['name' => 'admin']);
         $role->givePermissionTo(Permission::all());
    }
}
