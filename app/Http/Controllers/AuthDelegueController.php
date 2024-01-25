<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LogRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthDelegueController extends Controller
{
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
        return back()->withInput()->withErrors(['name' => 'Identifiants invalides']);
    }
}
