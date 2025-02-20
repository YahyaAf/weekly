<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function index($annonceId)
    {
        $annonce = Annonce::findOrFail($annonceId);
        $commentaires = $annonce->commentaires; 

        return view('commentaires.index', compact('commentaires', 'annonce'));
    }

    public function store(Request $request, $annonceId)
    {
        $request->validate([
            'contenu' => 'required|string|max:500',
        ]);

        $commentaire = new Commentaire();
        $commentaire->contenu = $request->contenu;
        $commentaire->user_id = auth()->id(); 
        $commentaire->annonce_id = $annonceId;
        $commentaire->save();

        return redirect()->route('commentaires.index', $annonceId)->with('success', 'Comment added successfully.');
    }

    public function edit($id)
    {
        $commentaire = Commentaire::findOrFail($id);
        return view('commentaires.edit', compact('commentaire'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'contenu' => 'required|string|max:500',
        ]);

        $commentaire = Commentaire::findOrFail($id);
        $commentaire->contenu = $request->contenu;
        $commentaire->save();

        return redirect()->route('commentaires.index', $commentaire->annonce_id)->with('success', 'Comment updated successfully.');
    }

    public function destroy($id)
    {
        $commentaire = Commentaire::findOrFail($id);
        $commentaire->delete();

        return redirect()->route('commentaires.index', $commentaire->annonce_id)->with('success', 'Comment deleted successfully.');
    }
}
