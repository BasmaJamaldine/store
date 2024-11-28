<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::insert([
            'name' =>"basma Jamaldine",
            'gender' => "female",
            'email' => "basma@gmail.ma",
            'password' => Hash::make(147852369),
            'profile_image' => "default.png" ,
            'role' =>"admin",
        ]);
    }
}
