<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tạo một khách hàng mẫu
        User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('password'),
        ]);

        // Tạo một khách hàng mẫu thứ 2
        User::create([
            'name' => 'Do Hoang Phuc',
            'email' => 'phucdo5255@gmail.com',
            'password' => bcrypt('password123'),
        ]);
    }
}
