<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RestaurantsTableSeeder;
use Database\Seeders\CategoriesTableSeeder;
use Database\Seeders\PlatsTableSeeder;
use Database\Seeders\OrdersTableSeeder;

// Ajoutez d'autres instructions use pour les autres seeders


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(CategoriesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RestaurantsTableSeeder::class);
        $this->call(PlatsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        // Ajoutez d'autres lignes pour les autres seeders

    }
}