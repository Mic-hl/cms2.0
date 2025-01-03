<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->withPersonalTeam()->create();

        User::factory()->withPersonalTeam()->create([
            'name' => 'Michl',
            'email' => 'm@mail.com',
            'password' => bcrypt('123123123'),
        ]);

        User::factory()->withPersonalTeam()->create([
            'name' => 'Marun',
            'email' => env('GLOBAL_ADMIN_EMAIL'),
            'password' => bcrypt('123123123'),
            'theme' => 'dark',
        ]);

        Project::factory()->count(100)->create();
    }
}
