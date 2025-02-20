<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Annonce;

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function index()
    {
        $annonces = Annonce::with('category', 'user')->get();
        return view('dashboard', compact('annonces'));
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

        return redirect()->route('commentaires.index')->with('success', 'Comment added successfully.');
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

        return redirect()->route('commentaires.index')->with('success', 'Comment updated successfully.');
    }

    public function destroy($id)
    {
        $commentaire = Commentaire::findOrFail($id);
        $commentaire->delete();

        return redirect()->route('commentaires.index')->with('success', 'Comment deleted successfully.');
    }
}
