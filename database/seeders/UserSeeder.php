<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run()
    {
        User::create([
            'name' => 'CRE1',
            'email' => 'cre1@example.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'DSE1',
            'email' => 'dse1@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}
