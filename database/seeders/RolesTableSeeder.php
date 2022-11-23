<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['role' => 'Administrador'],
            ['role' => 'Empresa'],
            ['role' => 'Técnico'],
        ];

        foreach ($roles as $value) {
            Role::create($value);
        }
    }
}
