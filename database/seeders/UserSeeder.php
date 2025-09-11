<?php

namespace Database\Seeders;

use Arr;
use Hash;
use App\Models\User;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'admin',
                'username' => 'admin',
                'role' => 'admin',
                'password' => Hash::make('1234'),
                'phone' => '08' + mt_rand(1000000000, 9999999999)
            ],
            [
                'name' => 'owner',
                'username' => 'owner',
                'role' => 'owner',
                'password' => Hash::make('1234'),
                'phone' => '08' + mt_rand(1000000000, 9999999999)
            ],
            [
                'name' => 'kasir',
                'username' => 'kasir',
                'role' => 'kasir',
                'password' => Hash::make('1234'),
                'phone' => '08' + mt_rand(1000000000, 9999999999)
            ],
        ];
        foreach($user as $i){
            User::create($i);
        }
    }
}
