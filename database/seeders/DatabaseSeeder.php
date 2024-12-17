<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Role::create([
            'name' => 'admin',
        ]);
        Role::create([
            'name' => 'user',
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role_id' => '1',
            'password' => bcrypt('12345678'),
        ]);

        Category::create([
            'name' => 'Horror'
        ]);

        Category::create([
            'name' => 'Action'
        ]);
    }
}
