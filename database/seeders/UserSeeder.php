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
            'name' => 'Victor Alvarez',
            'email' => 'admin@gmail.com',
            'username' => 'victoralvarez',
            'app' => 'Martinez',
            'apm' => 'Baca',
            'telefono' => '',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole('Administrador');
    }
}
