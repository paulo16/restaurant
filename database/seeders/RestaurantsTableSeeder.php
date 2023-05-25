<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;


class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Supprimer les enregistrements existants dans la table restaurants
        Restaurant::query()->delete();

        // Créer des enregistrements de restaurants factices
        Restaurant::create([
            'nom' => 'Restaurant 1',
            'adresse' => 'Adresse 1',
            'telephone' => '0684301106'
            // Autres colonnes spécifiques aux restaurants
        ]);

        Restaurant::create([
            'nom' => 'Restaurant 2',
            'adresse' => 'Adresse 2',
            'telephone' => '0684341106'
            // Autres colonnes spécifiques aux restaurants
        ]);

        // Ajouter d'autres enregistrements de restaurants si nécessaire

    }
}