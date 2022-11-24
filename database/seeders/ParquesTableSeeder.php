<?php

namespace Database\Seeders;

use App\Models\Parque;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParquesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parques = [
            [
                'parque' => 'PARK GRANDE',
                'calle' => 'Libramiento Norte',
                'municipio' => 'Tepotzotlán',
                'codigo' => '54607',
            ],
            [
                'parque' => 'consejo internacional de derechos humanos',
                'calle' => 'Atlixco',
                'municipio' => 'Cuauhtémoc',
                'codigo' => '76000',
            ],
            [
                'parque' => 'TRES RÍOS',
                'calle' => 'Rancho San Miguel S/N',
                'municipio' => 'Cuautitlán Izcalli',
                'codigo' => '54715',
            ],
            [
                'parque' => 'LAUREL',
                'calle' => 'Río Neva s/n, Col. Bosques de Xhala',
                'municipio' => 'Cuautitlán Izcalli',
                'codigo' => '54712',
            ],
            [
                'parque' => 'Parque Queretaro',
                'calle' => 'Carretera Queretaro San Luis Potosi, Av. La M',
                'municipio' => 'Santa Rosa Jáuregui, Qro',
                'codigo' => '76220',
            ],

        ];

        foreach ($parques as $key => $value) {
            Parque::create($value);
        }
    }
}
