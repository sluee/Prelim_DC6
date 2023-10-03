<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleandPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name'=>'admin']);
        $manager =Role::create(['name' => 'manager']);

        Permission::create(['name' =>'manage-suppliers']);
        Permission::create(['name' =>'manage-products']);
        Permission::create(['name' =>'manage-clients']);


        // $admin = Role::create(['name'=>'admin']);
        // $manager = Role::create(['name'=>'manager']);

        // Permission::create(['name'=>'manage-suppliers']);
        // Permission::create(['name'=> 'manage-products']);
        // Permission::create(['name'=> 'manage-users']);

      $admin->givePermissionTo(['manage-suppliers','manage-clients']);
      $manager->givePermissionTo('manage-products');

      User::find(1)->assignRole('admin');
      User::find(2)->assignRole('manager');

    }
}
