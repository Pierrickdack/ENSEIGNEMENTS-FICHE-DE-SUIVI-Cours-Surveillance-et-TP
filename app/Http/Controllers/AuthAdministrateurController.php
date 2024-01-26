<?php

namespace App\Http\Controllers;

use App\Models\Administrateur;
use Illuminate\Http\Request;
use App\Http\Requests\LogAdminRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class AuthAdministrateurController extends Controller {
    public function login(LogAdminRequest $request) {
        $credentials = $request -> validated();

        $admin = Administrateur::where([
            'emailCD' => $credentials['emailCD'],
        ])->first();

        if ($admin && Hash::check($credentials['mdpCD'], $admin -> mdpCD)) {

            $request->session()->regenerate();
            toastr()->success("Connexion réussie !");
            return redirect()->route('accueilDel');

        }

        toastr()->error('Identifiants invalides !!');
        return back()->withInput()->withErrors(['emailCD' => 'Identifiants invalides']);
    }
}
