<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kilometraje;

class KilometrajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kilometraje = Kilometraje::create([
            'costo' => 0.0,
        ]);
    }
}
