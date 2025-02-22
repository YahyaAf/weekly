<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'contenu' => 'required|string|max:1000', 
        ]);

        $commentaire = new Commentaire();
        $commentaire->contenu = $request->input('contenu');
        $commentaire->user_id = auth()->user()->id;
        $commentaire->annonce_id = $id;
        $commentaire->save();

        return redirect()->route('frontOffice.show', $id);
    }


    public function destroy($id)
    {
        $commentaire = Commentaire::where('id', $id)
            ->where('user_id', Auth::id()) 
            ->first();

        if (!$commentaire) {
            return back()->with('error', 'Vous ne pouvez pas supprimer ce commentaire.');
        }

        $commentaire->delete();
        return back()->with('success', 'Commentaire supprimé avec succès.');
    }

}
