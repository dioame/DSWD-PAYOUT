<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $initUsers = [
            [
                'id' => Str::uuid(),
                'name' => 'DIOAME JADE C. RENDON',
                'username' => 'djcrendon',
                'email' => 'djcrendon@admin.com',
                'password' => Hash::make('password'),
            ],
        ];  

        foreach($initUsers as $user){
            $createdUser = User::create([
                'email' => $user['email'],
                'password' => $user['password'], // You may adjust this as needed
                "name" =>  $user['name'],
                "username" =>  $user['username'],
                "password" =>  $user['password'],
            ]);
            
        }
        
    }
}
