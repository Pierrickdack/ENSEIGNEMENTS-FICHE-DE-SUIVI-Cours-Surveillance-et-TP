<?php

namespace App\Http\Controllers;

use App\Models\Enseignant;
use Illuminate\Http\Request;
use App\Http\Requests\LogEnsRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthEnseignantController extends Controller {
    public function login(LogEnsRequest $request) {

        $credentials = $request -> validated();

        $enseignant = Enseignant::where([
            'emailEns' => $credentials['emailEns'],
        ])->first();

        if ($enseignant && Hash::check($credentials['mdpEns'], $enseignant -> mdpEns)) {
            $request->session()->regenerate();
            toastr()->success("Connexion réussie !");
            return redirect()->route('accueilDel');
        } else {
            toastr()->error('Identifiants invalides !!');
        return back()->withInput()->withErrors(['nomEns' => 'Identifiants invalides']);
        }

    }
}
