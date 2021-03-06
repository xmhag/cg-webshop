<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = User::create([
        //     'first_name' => 'Admin',
        //     'email' => 'admin@admin.com',
        //     'password' => Hash::make('password'),
        // ]);

        $role = Role::create(['name' => 'admin']);
        $role = Role::create(['name' => 'klant']);


        // $permissions = Permission::pluck('id','id')->all();

        // $role->syncPermissions($permissions);

        // $user->assignRole([$role->id]);
    }
}
