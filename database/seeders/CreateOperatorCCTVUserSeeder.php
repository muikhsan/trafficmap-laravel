<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateOperatorCCTVUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'operator1',
            'email' => 'operator@cctv.com',
            'password' => Hash::make('12345678')
        ]);

        $role = Role::create(['name' => 'Operator CCTV']);

        $permissions = [
            'cctv-list',
        ];

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}


