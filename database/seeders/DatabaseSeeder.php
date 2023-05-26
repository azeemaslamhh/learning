<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);
        $user = User::create([
            'name' => 'Admin One',
            'email' => 'adminone@test.com',
            'password' => bcrypt('password'),
        ]);
        $adminRole = Role::where('name', 'admin')->first();
        $user->roles()->attach($adminRole);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
