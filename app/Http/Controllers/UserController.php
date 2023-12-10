<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
public function inscription(Request $request)
    {
        $utilisateurDonne = $request->validate([
            "name" => ["required", "string"],
            "telephone" => ["required", "integer", "unique:users,telephone"],
            "email" => ["required", "string"],
            "password" => ["required", "string", "min:8", "max:30", "confirmed"]
        ]);
        
        $utilisateur = User::create([
            "name" => $utilisateurDonne["name"],
            "telephone" => $utilisateurDonne["telephone"],
            "email" => $utilisateurDonne["email"],
            "password" => bcrypt($utilisateurDonne["password"])
        ]);

        return response($utilisateur, 201);
    }

    public function connexion(Request $request)
    {
        $utilisateurDonne = $request->validate([
            "telephone" => ["required", "integer"],
            "password" => ["required", "string", "min:8", "max:30"]
        ]);
        

        $utilisateur = User::where("telephone", $utilisateurDonne['telephone'])->first();

        return $utilisateur;
    }

    public function deconnexion(Request $request)
    {
        $user = Auth::user();

        return response()->json(['message' => 'Déconnexion réussie']);
    }
}
