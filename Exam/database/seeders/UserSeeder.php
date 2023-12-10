<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' =>'bsmala',
            'last_name'  => 'awad',
            'email'      => 'bosi@gmail.com',
            'password'   => '123bosi',
        ]);
    }
}
