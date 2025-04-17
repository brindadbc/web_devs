<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Lecon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'lecon_id' => 'required|exists:lecons,id',
            'contenu' => 'required|string|max:1000',
        ]);

        Commentaire::create([
            'lecon_id' => $request->lecon_id,
            'contenu' => $request->contenu,
            'user_id' => auth()->id(), // Récupérer l'ID de l'utilisateur connecté
        ]);

        return redirect()->back()->with('success', 'Commentaire ajouté avec succès.');
    }

    public function index($lecon_id)
    {
        $lecon = Lecon::findOrFail($lecon_id);
        $commentaires = Commentaire::where('lecon_id', $lecon_id)->get();

        return view('commentaire.index', compact('lecon', 'commentaires'));
    }

    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();
        return redirect()->back()->with('success', 'Commentaire supprimé avec succès.');
    }
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     //
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // // public function store(Request $request,$lecon_id)
    // // {
    // //     $request->validate([
    // //         'contenu' => 'required|string|max:500'
    // //     ]);

    // //     Commentaire::create([
    // //         'contenu' => $request->contenu,
    // //         'user_id' => Auth::id(),
    // //         'lecon_id' => $lecon_id
    // //     ]);

    // //     return redirect()->route('lecon.show', $lecon_id)->with('success', 'Commentaire ajouté avec succès.');
    // // }
    // public function store(Request $request, $lecon_id)
    // {
    //     $request->validate([
    //         'message' => 'required|string',
    //     ]);

    //     Commentaire::create([
    //         'message' => $request->message,
    //         'lecon_id' => $lecon_id,
    //     ]);

    //     return redirect()->route('lecon.show', $lecon_id)->with('success', 'Commentaire ajouté!');
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(string $id)
    // {
    //     //
    // }
}
