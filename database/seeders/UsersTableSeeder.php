<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Supprimer les enregistrements existants dans la table users
        User::query()->delete();

        // Créer un utilisateur factice avec mot de passe crypté
        User::create([
            'name' => 'Pharma',
            'lastname' => 'Test',
            'email' => 'test@gmail.com',
            'password' => Hash::make('secret'),
            // Autres colonnes spécifiques aux utilisateurs
        ]);

        User::create([
            'name' => 'Philippe Berno',
            'lastname' => 'Berno',
            'email' => 'phil@gmail.com',
            'password' => Hash::make('secret'),
            // Autres colonnes spécifiques aux utilisateurs
        ]);

        // Ajouter d'autres utilisateurs si nécessaire
    }
}