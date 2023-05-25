<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Supprimer les enregistrements existants dans la table categories
        Category::query()->delete();

        // Créer des enregistrements de catégories factices
        Category::create([
            'nom' => 'menus',
            'description' => 'les menus du jour',
            // Autres colonnes spécifiques aux catégories
        ]);

        Category::create([
            'nom' => 'desert',
            'description' => 'les deserts du matin',
            // Autres colonnes spécifiques aux catégories
        ]);

        // Ajouter d'autres enregistrements de catégories si nécessaire
    }
}