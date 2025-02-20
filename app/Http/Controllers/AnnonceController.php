<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\Category;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $annonces = Annonce::with('category', 'user')->get();
        $categories = Category::all();
        
        return view('annonces.index', compact('annonces', 'categories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('annonces.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categorie_id' => 'required|exists:categories,id',
            'status' => 'required|in:actif,brouillon,archivé'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('annonces', 'public');
        } else {
            $imagePath = null;
        }

        Annonce::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'prix' => $request->prix,
            'image' => $imagePath, 
            'user_id' => auth()->id(),
            'categorie_id' => $request->categorie_id,
            'status' => $request->status
        ]);

        return redirect()->route('annonces.index')->with('success', 'Annonce ajoutée avec succès !');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $annonce = Annonce::with('category', 'user')->find($id);
        if (!$annonce) {
            return redirect()->route('annonces.index')->with('error', 'Annonce non trouvée !');
        }
        return view('annonces.show', compact('annonce'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $annonce = Annonce::with('category', 'user')->find($id);
        if (!$annonce) {
            return redirect()->route('annonces.index')->with('error', 'Annonce non trouvée !');
        }

        return view('annonces.edit', compact('annonce'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categorie_id' => 'required|exists:categories,id',
            'status' => 'required|in:actif,brouillon,archivé'
        ]);

        $annonce = Annonce::find($id);
        if (!$annonce) {
            return redirect()->route('annonces.index')->with('error', 'Annonce non trouvée !');
        }
        if ($request->hasFile('image')) {
            if ($annonce->image) {
                Storage::delete('public/' . $annonce->image);
            }
            $imagePath = $request->file('image')->store('annonces', 'public');
            $annonce->image = $imagePath;
        }

        $annonce->update([
            'titre' => $request->titre,
            'description' => $request->description,
            'prix' => $request->prix,
            'categorie_id' => $request->categorie_id,
            'status' => $request->status,
        ]);

        return redirect()->route('annonces.index')->with('success', 'Annonce mise à jour avec succès !');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
