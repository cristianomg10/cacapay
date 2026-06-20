<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'cristianooo@gmail.com'],
            [
                'name' => 'Cristiano',
                'password' => 'ifsc123',
                'is_admin' => true,
            ]
        );
    }
}
