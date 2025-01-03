<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=> 'Patasani Rohman Nuru',
                'email'=> 'nuru@gmail.com',
                'role' => 'superadmin',
                'password'=>bcrypt('123')
            ],
            [
                'name'=> 'Aknafull',
                'email'=> 'anaf@gmail.com',
                'role' => 'admin',
                'password'=>bcrypt('123')
            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
