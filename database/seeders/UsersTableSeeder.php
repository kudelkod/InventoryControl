<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[
            [
                'name' => 'admin',
                'email' => 'admin@admin.loc',
                'password' => '$2y$10$MOqRnj/6/0Ig24lt.IpAI.tLF3h.7nr6ZVQmvR1Z29R4GYRT3OEoa',
                'role_id' => 1,
            ],
        ];

        \DB::table('users')->insert($data);
    }
}
