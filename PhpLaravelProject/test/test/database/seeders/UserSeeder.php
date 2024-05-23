<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\usermodel;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        usermodel::factory()->create([
            'name' => 'Тестовый Пользователь',
            'email' => 'test@example.com',
            // Добавьте другие поля, если они есть
        ]);
    }
}

