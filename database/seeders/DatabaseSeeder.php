<?php

namespace Database\Seeders;

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
        \App\Models\User::factory()->create([
            'name'=> 'Beto Pinzon' ,
            'email' => 'bto@admin.com',
            'password' => bcrypt('123456')
        ]);
        \App\Models\Category::factory(6)->create();
        \App\Models\Teacher::factory(6)->create();
        \App\Models\Courser::factory(6)->create();
        \App\Models\Post::factory(200)->create();
    }
}
