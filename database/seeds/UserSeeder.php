<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin123'),
                'first_name' => 'admin',
                'last_name' => 'admin',
                'Gender' => 'male',
                'address' => 'admin',
                'contact_number' => '012345678',
                'role_id' => 1
            ],
            [
                'email' => 'user@user.com',
                'password' => Hash::make('admin123'),
                'first_name' => 'user',
                'last_name' => 'user',
                'Gender' => 'male',
                'address' => 'user',
                'contact_number' => '012345678',
                'role_id' => 2
            ]
        ]);

    }
}
