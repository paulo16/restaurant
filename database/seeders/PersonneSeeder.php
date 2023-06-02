<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Personne;

class PersonneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Supprimer les enregistrements existants dans la table orders
        Personne::query()->delete();
        // Utilisez la méthode create pour créer une instance de modèle et l'insérer dans la base de données
        Personne::create([
            'nom' => 'John Doe',
            'prenom' => 'Jane Doe',
            'telephone' => '0644563380',
            'email' => 'test@gmail.com'
        ]);

        Personne::create([
            'nom' => 'Cliente1',
            'prenom' => 'Pharma',
            'telephone' => '0644563381',
            'email' => 'pharma-client@gmail.com'
        ]);

        Personne::create([
            'nom' => 'Cliente2',
            'prenom' => 'Robert',
            'telephone' => '0644563780',
            'email' => 'robert-client@gmail.com'
        ]);

        // Vous pouvez ajouter d'autres données si nécessaire
    }
}