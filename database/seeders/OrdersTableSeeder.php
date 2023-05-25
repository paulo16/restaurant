<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Commande;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Supprimer les enregistrements existants dans la table orders
        Commande::query()->delete();

        // Créer des enregistrements de commandes factices
        Commande::create([
            'plat_id' => 1,
            // ID du restaurant associé
            'user_id' => 1,
            // ID de l'utilisateur associé
            'quantite' => 1,
            // Autres colonnes spécifiques aux commandes
        ]);

        Commande::create([
            'plat_id' => 2,
            // ID du restaurant associé
            'user_id' => 2,
            // ID de l'utilisateur associé
            'quantite' => 1,
            // Autres colonnes spécifiques aux commandes
        ]);

        // Ajouter d'autres enregistrements de commandes si nécessaire
    }
}