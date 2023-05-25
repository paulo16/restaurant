<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plat;

class PlatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Supprimer les enregistrements existants dans la table dishes
        Plat::query()->delete();

        // Créer des enregistrements de plats factices
        Plat::create([
            'nom' => 'Plat 1',
            'description' => 'Description du plat 1',
            'prix' => 9.99,
            // ID de la catégorie associée
            'categorie_id' => 1,
            'restaurant_id' => 1, // ID du restaurant associé
            // Autres colonnes spécifiques aux plats
        ]);

        Plat::create([
            'nom' => 'Plat 2',
            'description' => 'Description du plat 2',
            'prix' => 12.99,
            // ID de la catégorie associée
            'categorie_id' => 2,
            'restaurant_id' => 2, // ID du restaurant associé
            // Autres colonnes spécifiques aux plats
        ]);

        // Ajouter d'autres enregistrements de plats si nécessaire

    }
}