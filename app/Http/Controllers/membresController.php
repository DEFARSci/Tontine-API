<?php

namespace App\Http\Controllers;

use App\Models\Membres;
use Illuminate\Http\Request;


class membresController extends Controller
{
    public function index()
    {
        $membres = Membres::all();
        return response($membres);
    }

    public function store(Request $request)
    {
        $membresValidation = $request->validate([
            "nom" => ["required", "string"],
            "prenom" =>["required","string"],
            "adress" => ["required", "string"],
            "email" => ["required", "string"],
            "telephone" => ["required", "integer"],
            "nombre_main" => ["required", "integer"]
        ]);

        $membres = Membres::create([
            "nom" => $membresValidation["nom"],
            "prenom" => $membresValidation["prenom"],
            "adress" => $membresValidation["adress"],
            "email" => $membresValidation["email"],
            "telephone" => $membresValidation["telephone"],
            "nombre_main" => $membresValidation["nombre_main"]
        ]);

        return response(["message" => "membres ajouté"], 201);
    }

   public function update(Request $request,$id){

    $membresValidation = $request->validate([
        "nom" => ["required", "string"],
        "prenom" =>["required","string"],
        "adress" => ["required", "string"],
        "email" => ["required", "string"],
        "telephone" => ["required", "integer"],
        "nombre_main" => ["required", "integer"]
    ]);
    {
        $membre = Membres::find($id);

        if (!$membre) {
            return response(["message" => "Membre non trouvé"], 404);
        }

        // Mettez à jour les données du membre avec les données de la requête
        $membre->update($request->all());

        return response($membre);
    }
   }
   public function destroy($id)
{
    $membres = Membres::find($id);

    if (!$membres) {
    return response(["message" => "'error', 'Membre non trouve'"], 404);
    }

    $membres->delete();

    return response(["message" => "'success', 'Membre supprimé avec succès'"], 404);
    
}
}
