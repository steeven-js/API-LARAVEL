<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = ['Admin Test', 'User Test'];
        $emails = ['admin@test.com', 'user@test.com'];
        $commonPassword = 'password';

        $count = count($names);

        // Bocuclez sur les noms et les emails pour les insérer dans la base de données
        for ($i = 0; $i < $count; $i++) {
            // Vérifiez si l'email existe déjà dans la base de données
            $existingUser = User::where('email', $emails[$i])->first();

            // Si l'utilisateur n'existe pas, créez une nouvelle entrée
            if (!$existingUser) {
                $user = new User();
                $user->name = $names[$i];
                $user->email = $emails[$i];
                $user->password = Hash::make($commonPassword);
                $user->save();
            }
        }
    }
}
