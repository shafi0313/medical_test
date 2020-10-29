<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => '0',
                'is_' => '1',
                'age' => '24',
                'gender' => 'Male',
                'phone' => '01725848515',
                'address' => 'Dhala',
                'password' => bcrypt('1'),
            ],

        ];
        User::insert($users);
    }
}
