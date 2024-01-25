<?php

namespace App\Http\Controllers;

use App\Models\Delegue;
use Illuminate\Http\Request;
use App\Http\Requests\LogDelRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthDelegueController extends Controller {

    public function index() {
        return view('delegue.accueil');
    }

    
    public function login(LogDelRequest $request) {
        $credentials = $request -> validated();

        $delegue = Delegue::where([
            'matDel' => $credentials['matDel'],
        ])->first();

        if ($delegue && Hash::check($credentials['mdpDel'], $delegue -> mdpDel)) {

            $request->session()->regenerate();
            toastr()->success("Connexion réussie !");
            return redirect()->route('accueilDel');

        }

        toastr()->error('Identifiants invalides !!');
        return back()->withInput()->withErrors(['matDel' => 'Identifiants invalides']);
    }
}
