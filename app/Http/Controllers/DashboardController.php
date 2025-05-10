<?php

namespace App\Http\Controllers;

use App\Models\Probleme;
use App\Models\Solution;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all problems with related solution counts and solution details
        $posts = Probleme::leftJoin('solutions', 'solutions.probleme_id', '=', 'problemes.id')
            ->leftJoin('users AS p_owner', 'p_owner.id', '=', 'problemes.user_id')
            ->leftJoin('users AS s_owner', 's_owner.id', '=', 'solutions.user_id')
            ->select(
                'problemes.id AS p_id',
                'problemes.titre AS p_titre',
                'problemes.discription AS p_discription',
                'problemes.fichier_description AS p_fichier_description',
                'problemes.date_soumission AS p_date_soumission',
                'p_owner.nom AS p_owner_nom',
                'p_owner.prenom AS p_owner_prenom',
                'p_owner.photo AS p_owner_photo',
                'p_owner.role AS p_owner_role',
                'solutions.id AS s_id',
                'solutions.titre AS s_titre',
                'solutions.discription AS s_discription',
                'solutions.fichier_solution AS s_fichier_solution',
                'solutions.date_response AS s_date_response',
                's_owner.nom AS s_owner_nom',
                's_owner.prenom AS s_owner_prenom',
                's_owner.photo AS s_owner_photo',
                's_owner.role AS s_owner_role'
            )
            ->withCount('solutions') // Get the count of solutions for each problem
            ->groupBy(
                'problemes.id',
                'problemes.titre',
                'problemes.discription',
                'problemes.fichier_description',
                'problemes.date_soumission',
                'p_owner.nom',
                'p_owner.prenom',
                'p_owner.photo',
                'p_owner.role',
                'solutions.id',
                'solutions.titre',
                'solutions.discription',
                'solutions.fichier_solution',
                'solutions.date_response',
                's_owner.nom',
                's_owner.prenom',
                's_owner.photo',
                's_owner.role'
            )
            ->get();

        // Group solutions by problem ID
        $groupedPosts = $posts->groupBy('p_id');
        // dd($groupedPosts);

        return view('dashboard', ['groupedPosts' => $groupedPosts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
