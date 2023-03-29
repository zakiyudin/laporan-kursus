<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'Superadmin',
            'username' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password'),
            'address' => 'Mojosari',
            'status' => 0,
            'no_hp' => '085961463178',
            'jabatan' => 'admin'
        ]);
    }
}
