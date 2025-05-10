<?php

namespace App\Http\Controllers;

use App\Models\Probleme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProblemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $owner_id = Auth::user()->getAuthIdentifier();
        $problèmes = Probleme::where('user_id', $owner_id)->get();
        return view('problèmes.index', compact('problèmes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('problèmes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => ['string', 'required'],
            'discription' => ['string', 'required'],
            'fichier_description' => ['string'],
            'date_soumission' => ['string'],
        ]);
        $owner_id = Auth::user()->getAuthIdentifier();
        // dd($owner_id);
        $probleme = new Probleme([
            'titre' => $request->get('titre'),
            'discription' => $request->get('discription'),
            'fichier_description' => $request->get('fichier_description'),
            'date_soumission' => $request->get('date_soumission'),
        ]);
        $probleme->user_id = $owner_id;
        $probleme->save();
        return redirect('/problemes')->with('success', 'Le patient a été enregistré!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $problèmes = Probleme::find($id);
        return view('problèmes.edit', compact('problèmes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => ['string'],
            'discription' => ['string'],
            'fichier_description' => ['string'],
            'date_soumission' => ['string'],
            'user_id' => ['string'],
        ]);
        $probleme = Probleme::find($id);
        $probleme->titre = $request->get('titre');
        $probleme->discription = $request->get('discription');
        $probleme->fichier_description = $request->get('fichier_description');
        $probleme->date_soumission = $request->get('date_soumission');
        $probleme->save();
        return redirect('/problemes')->with('success', 'Le patient a été modifié!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $probleme = Probleme::find($id);
        $probleme->delete();
        return redirect('/problemes')->with('success', 'Le patient a été supprimé!');
    }
}
