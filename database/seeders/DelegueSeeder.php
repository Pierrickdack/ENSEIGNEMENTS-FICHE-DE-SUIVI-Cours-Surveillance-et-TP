<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Delegue;
use Illuminate\Support\Facades\Hash;

class DelegueSeeder extends Seeder
{
    public function run()
    {
        // Insérer des données dans la table delegues
        Delegue::create([
            'nameDel' => 'Pierrick',
            'matDel' => '21Q2493',
            'mdpDel' => Hash::make('rnbking2001'),
        ]);

        // Ajoutez d'autres données si nécessaire
    }
}
