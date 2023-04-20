<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'username' => 'admin',
            'app' => '',
            'apm' => '',
            'sexo' => 'MASCULINO',
            'telefono' => '',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole('Admin');
    }
}
