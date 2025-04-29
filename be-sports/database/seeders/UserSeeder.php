<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Test User', // wajib isi name
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin') // jangan lupa di-bcrypt!
        ]);
    }
}
