<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $annonces = Annonce::query()->orderBy('id')->paginate(9);
        return view('dashboard', compact('annonces'));
    }

    public function show(Annonce $annonce)
    {
        return view('frontOffice.show', compact('annonce'));
    }

}