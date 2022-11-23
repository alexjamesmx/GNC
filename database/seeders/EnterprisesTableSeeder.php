<?php

namespace Database\Seeders;

use App\Models\Enterprise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnterprisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $enterprises = [
            [
                'enterprise' => 'Telmex',
                'razon_social' => 'EXPERIENCIA DE IMPACTOS DIGITALES SA DE CV',
                'rfc' => 'EID-150522-K85',
                'address' => 'AV. PASEO DE LA CONSTITUCIÓN NUM 100 INT. 3',
                'ciudad' => 'QUERETARO, QRO.',
                'cp' => '76140',
                'regimen_fiscal' => 'SIMPLIFICADO DE CONFIANZA',
                'phone' => '4424865389',
                'fax' => '000000',
                'location' => 'https://www.google.com.mx/maps/place/Impactos',
                'status_id' => 1,
                'user_id' => 1,
            ],
            [
                'enterprise' => 'FIBRA PROLOGIS MÉXICO ',
                'razon_social' => 'FIBRA PROLOGIS',
                'rfc' => 'FPM1308136P7',
                'address' => 'PASEO DE LOS TAMARINDOS 90 TORRE 2 PISO 22 CO',
                'ciudad' => 'CUAJIMALPA DE MORELOS',
                'cp' => '05120',
                'regimen_fiscal' => 'RÉGIMEN GENERAL DE LEY DE PERSONAS MORALES',
                'phone' => '5511052900',
                'fax' => 'Taxmexico@prologis.com',
                'location' => 'CIUDAD DE MÉXICO',
                'status_id' => 1,
                'user_id' => 2,
            ],

        ];

        foreach ($enterprises as $value) {
            Enterprise::create($value);
        }
    }
}
