<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        //Alte Variante:
        $roles = [
            [
                'id'    => 1,
                'title' => 'Viewer',
            ],
            [
                'id'    => 2,
                'title' => 'Billing',
            ],
            [
                'id'    => 3,
                'title' => 'SOC',
            ],
            [
                'id'    => 4,
                'title' => 'Admin',
            ],
        ];

        Role::insert($roles);

        //refactoring:
        /* Role::create(['title' => 'viewer']);
        Role::create(['title' => 'billing']);
        Role::create(['title' => 'soc']);
        Role::create(['title' => 'admin']); */


    }
}
