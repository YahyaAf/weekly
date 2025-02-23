<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AnnonceRequest;
use Illuminate\Database\Eloquent\SoftDeletes;


class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $annonces = Annonce::with('category', 'user')->where('user_id', auth()->id())->get();
        $categories = Category::all();
        return view('annonces.index', compact('annonces', 'categories'));
    }

    public function archive()
    {
        $deletedAnnonces = Annonce::onlyTrashed()
            ->with('category', 'user')
            ->where('user_id', auth()->id())
            ->get();

        return view('annonces.archive', compact('deletedAnnonces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('annonces.create',compact('categories') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnnonceRequest $request)
    {
        $imagePath = $request->hasFile('image')
            ? $request->file('image')->store('/annonces', 'public')
            : null;

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
        $categories = Category::all();
        $annonce = Annonce::with('category', 'user')->find($id);
        return view('annonces.edit', compact('annonce','categories'));
        if (!$annonce) {
            return redirect()->route('annonces.index')->with('error', 'Annonce non trouvée !');
        }

        return view('annonces.edit', compact('annonce'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnnonceRequest $request, string $id)
    {
        $annonce = Annonce::find($id);
        if (!$annonce) {
            return redirect()->route('annonces.index')->with('error', 'Annonce non trouvée !');
        }

        if ($request->hasFile('image')) {
            if ($annonce->image) {
                Storage::delete('public/' . $annonce->image);
            }
            $imagePath = $request->file('image')->store('/annonces', 'public');
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
        $annonce = Annonce::find($id);

        if ($annonce) {
            $annonce->delete(); 
            return redirect()->route('annonces.index')->with('success', 'Annonce deleted successfully');
        }

        return redirect()->route('annonces.index')->with('error', 'Annonce not found');
    }

    public function restore($id)
    {
        $annonce = Annonce::onlyTrashed()->find($id);

        if (!$annonce) {
            return redirect()->route('annonces.index')->with('error', 'Annonce non trouvée.');
        }

        $annonce->restore();
        return redirect()->route('annonces.index')->with('success', 'Annonce restaurée avec succès.');
    }

    public function forceDelete($id)
    {
        $annonce = Annonce::onlyTrashed()->find($id);

        if (!$annonce) {
            return redirect()->route('annonces.index')->with('error', 'Annonce non trouvée.');
        }

        $annonce->forceDelete();
        return redirect()->route('annonces.index')->with('success', 'Annonce supprimée définitivement.');
    }


}
