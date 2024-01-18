<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\filiere;

class FiliereController extends Controller
{
    //
    public function ajout_filiere( ){
        $Filiere = filiere::all();
        return view('home.ajout_filiere',compact('Filiere'));
    }

    public function ajout_filiere_traitement(Request $request)
    {
        $request->validate([
            'filiere' => 'required',
        ]);

        $filiere = new filiere();
        $filiere->filiere = $request->filiere;

        $filiere->save();

        return Redirect('/filiere')->with('status', 'Filiere ajoute avec success');

    }

    public function update_filiere ($id ){
        $Filiere = filiere::find($id);
        return view('/filiere.update',compact('Filiere'));
    }

    public function update_filiere_traitement(Request $request)
    {
        $request->validate([
            'filiere' => 'required',
        ]);

        $filiere = filiere::find($request->id);
        $filiere->filiere = $request->filiere;

        $filiere->update();

        return Redirect('/filiere')->with('status', 'Filiere modifie avec success');

    }

    public function delete_filiere($id){
        $Filiere = filiere::find($id);
        $Filiere->delete();
        return Redirect('./filiere')->with('status', 'filiere supprime avec success');
    }
}