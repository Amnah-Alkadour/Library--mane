<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'), 
        ]);

        User::create([
            'name' => 'Ahmad Ali',
            'email' => 'ahmad4.ali@example.com',
            'password' => Hash::make('password1234'),
        ]);

        User::create([
            'name' => 'Sara Hassan',
            'email' => 'sara4.hassan@example.com',
            'password' => Hash::make('password4564'),
        ]);

        User::create([
            'name' => 'Mohamed Salah',
            'email' => 'mohamed4.salah@example.com',
            'password' => Hash::make('password7894'),
        ]);
        
    }
}
