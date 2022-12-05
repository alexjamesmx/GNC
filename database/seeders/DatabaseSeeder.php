<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Parque;
use App\Models\Role;
use App\Models\Status;
use App\Models\Subestacion;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(RolesTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        // $this->call(ParquesTableSeeder::class);
        Parque::factory(10)->create();
        User::factory(10)->create();
        $this->call(EnterprisesTableSeeder::class);
        $this->call(TypeTableSeeder::class);
        Subestacion::factory(10)->create();



        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //ROLES SEEDER
    }
}
