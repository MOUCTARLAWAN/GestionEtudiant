<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\filiere;
use Illuminate\Support\Facades\Redirect;

class EtudiantController extends Controller
{
    public function liste_etudiant( ){
        $etudiants = Etudiant::all();

        return view('home.dashboard', compact('etudiants'));
    }

    public function ajouter_etudiant( ){
        $Filiere = filiere::all();
        return view('home.ajouter', compact('Filiere'));
    }

    public function ajouter_etudiant_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'sexe' => 'required',
            'filiere' => 'required',
        ]);

        $etudiant = new Etudiant();
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->sexe = $request->sexe;
        $etudiant->filiere = $request->filiere;

        $etudiant->save();

        return Redirect('/ajouter')->with('status', 'Etudiant ajoute avec success');

    }

    public function update_etudiants($id){
        $etudiants = Etudiant::find($id);
        $Filiere = filiere::all();
        return view('etudiant.update', compact('etudiants','Filiere'));

    }

    public function update_etudiant_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'sexe' => 'required',
            'filiere' => 'required',
        ]);

        $etudiant = Etudiant::find($request->id);
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->sexe = $request->sexe;
        $etudiant->filiere = $request->filiere;

        $etudiant->update();

        return Redirect('./etudiant')->with('status', 'Etudiant modifie avec success');

    }

    public function delete_etudiants($id){
        $etudiants = Etudiant::find($id);
        $etudiants->delete();
        return Redirect('./etudiant')->with('status', 'Etudiant supprime avec success');
    }



}
