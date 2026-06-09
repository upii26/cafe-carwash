<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::insert([
            ["name_category" => "Minuman"],
            ["name_category" => "Makanan"],
            ["name_category" => "Carwash"],
        ]);

        User::insert([
            [
                "name" => "Owner",
                "email" => "owner@example.com",
                "password" => Hash::make("password123"),
                "role" => "owner",
            ],
            [
                "name" => "Kasir",
                "email" => "kasir@example.com",
                "password" => Hash::make("password123"),
                "role" => "kasir",
            ],
        ]);
    }
}
