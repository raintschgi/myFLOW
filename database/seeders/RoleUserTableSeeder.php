<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    public function run()
    {
        User::findOrFail(1)->roles()->sync(4); //hier wird dem User mit ID 1 (admin) die Rolle 1 (admin) zugeteilt
        User::findOrFail(2)->roles()->sync(2); //hier wird dem User mit ID 2 (user) die Rolle 2 (user) zugeteilt
    }
}
