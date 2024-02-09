<?php

namespace App\Http\Controllers;

use App\Models\Delegue;
use Illuminate\Http\Request;
use App\Http\Requests\LogDelRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthDelegueController extends Controller {


    public function login(LogDelRequest $request) {
        $credentials = $request -> validated();

        dd($request);

        $delegue = Delegue::where([
            'matDel' => $credentials['matDel'],
        ])->first();

        if ($delegue && Hash::check($credentials['mdpDel'], $delegue -> mdpDel)) {

            $request->session()->regenerate();
            toastr()->success("Connexion réussie !");

            $username = $delegue->nameDel;

            return redirect()->route('accueilDel')->with('username', $username);

        }

        toastr()->error('Identifiants invalides !!');
        return back()->withInput()->withErrors(['matDel' => 'Identifiants invalides']);
    }

    public function store(LogDelRequest $request) {
        $data = $request->validated();

        // Vérifier si le matricule existe déjà dans la base de données
        $matriculeExiste = Delegue::where('matDel', $data['matDel'])->exists();

        if ($matriculeExiste) {
            return redirect()->route('delegues.main')->with('error', 'Le matricule existe déjà.');
        }

        // Créer un nouveau délégué
        $delegue = new Delegue();
        $delegue->nameDel = $data['nameDel'];
        $delegue->matDel = $data['matDel'];
        $delegue->mdpDel = Hash::make($data['mdpDel']);
        $delegue->save();

        // Rediriger vers une page de confirmation ou une autre vue
        return redirect()->route('delegues.main')->with('success', 'Enregistré avec succès.');
    }
}
