<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Игорь',
            'surname' => 'Лёвин',
            'patronymic' => 'Александрович',
            'login' => 'igorliovin105',
            'email' => 'igorliovin07@gmail.com',
            'password' => Hash::make('123123123'),
        ]);
        User::create([
            'name' => 'Игорь',
            'surname' => 'Лёвин',
            'patronymic' => 'Александрович',
            'login' => 'admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('admin77'),
        ]);
    }
}
