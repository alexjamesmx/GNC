<?php

namespace Database\Seeders;

use App\Models\Tipo_inspeccion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoInspeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['tipo' => 'edificio'], ['tipo' => 'electrica'], ['tipo' => 'transformador']
        ];

        foreach ($types as $key => $value) {
            Tipo_inspeccion::create($value);
        }
    }
}
