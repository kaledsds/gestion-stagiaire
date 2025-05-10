<?php

namespace App\Http\Controllers;

use App\Models\Solution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $solutions = Solution::all();
        return view('problèmes.index', compact('solutions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $p_id)
    {
        $probleme_id = $p_id;
        $owner_id = Auth::user()->getAuthIdentifier();
        return view('solutions.create', compact('probleme_id', 'owner_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $probleme_id)
    {
        $request->validate([
            'titre' => ['string', 'required'],
            'discription' => ['string', 'required'],
            'fichier_solution' => ['string'],
            'date_response' => ['string'],
        ]);


        $owner_id = Auth::user()->getAuthIdentifier();
        $solution = new Solution([
            'titre' => $request->get('titre'),
            'discription' => $request->get('discription'),
            'fichier_solution' => $request->get('fichier_solution'),
            'date_response' => $request->get('date_response'),
            'probleme_id' => $probleme_id,
            'user_id' => $owner_id,
        ]);
        $solution->save();
        return redirect('/dashboard')->with('success', 'Le patient a été enregistré!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $s_id)
    {
        // Fetch the solution with the joined user data
        $solution = Solution::join('users', 'users.id', '=', 'solutions.user_id')
            ->where('solutions.id', $s_id)
            ->select(
                'solutions.id AS s_id',
                'solutions.titre AS s_titre',
                'solutions.discription AS s_discription',
                'solutions.fichier_solution AS s_fichier_solution',
                'solutions.date_response AS s_date_response',
                'users.nom AS s_owner_nom',
                'users.prenom AS s_owner_prenom',
                'users.photo AS s_owner_photo',
                'users.role AS s_owner_role'
            )
            ->first(); // Use first() to get a single result

        // Check if solution was found
        if (!$solution) {
            // Handle the case where the solution is not found
            return redirect()->back()->with('error', 'Solution not found.');
        }

        // Pass the solution data to the view
        return view('solutions.solution', compact('solution'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $solutions = Solution::find($id);
        return view('solutions.edit', compact('solutions'));
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
        $solution = Solution::find($id);
        $solution->titre = $request->get('titre');
        $solution->discription = $request->get('discription');
        $solution->fichier_solution = $request->get('fichier_solution');
        $solution->date_response = $request->get('date_response');
        $solution->save();
        return redirect('/solutions')->with('success', 'Le patient a été modifié!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $solution = Solution::find($id);
        $solution->delete();
        return redirect('/solutions')->with('success', 'Le patient a été supprimé!');
    }
}
