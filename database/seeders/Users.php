<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([ // Admin
            'name' => Str::title('Alan Garduño'),
            'email' => Str::lower('alansgp@outlook.com'),
            'password' => Hash::make('qazwsxedc'),
            'email_verified_at' => now(),
        ])->assignRole('admin');
    }
}
