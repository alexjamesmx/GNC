<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            ['status' => 'Inactivo'],
            ['status' => 'En inspección'],
            ['status' => 'Activo'],
        ];

        foreach ($status as $key => $value) {
            Status::create($value);
        }
    }
}
