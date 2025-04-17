<?php

namespace App\Http\Controllers;

use App\Models\Lecon;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     //
    // }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request,$lecon_id)
    // {
    //     $request->validate([
    //         'valeur' => 'required|integer|min:1|max:5'
    //     ]);

    //     // Vérifier si l'utilisateur a déjà noté cette leçon
    //     $noteExistante = Note::where('user_id', Auth::id())->where('lecon_id', $lecon_id)->first();

    //     if ($noteExistante) {
    //         $noteExistante->update(['valeur' => $request->valeur]);
    //     } else {
    //         Note::create([
    //             'valeur' => $request->valeur,
    //             'user_id' => Auth::id(),
    //             'lecon_id' => $lecon_id
    //         ]);
    //     }

    //     return redirect()->route('lecon.show', $lecon_id)->with('success', 'Note enregistrée avec succès.');

    // }

    // public function store(Request $request, $lecon_id)
    // {
    //     $request->validate([
    //         'note' => 'required|integer|min:1|max:5',
    //     ]);

    //     Note::create([
    //         'note' => $request->note,
    //         'lecon_id' => $lecon_id,
    //     ]);

    //     return redirect()->route('lecon.show', $lecon_id)->with('success', 'Note ajoutée!');
    // }

    //  /**
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

    public function store(Request $request)
    {
        $request->validate([
            'lecon_id' => 'required|exists:lecons,id',
            'valeur' => 'required|integer|min:1|max:5',
        ]);

        Note::create([
            'lecon_id' => $request->lecon_id,
            'valeur' => $request->valeur,
            'user_id' => auth()->id(), // Récupérer l'ID de l'utilisateur connecté
        ]);

        return redirect()->back()->with('success', 'Note ajoutée avec succès.');
    }

    public function index($lecon_id)
    {
        $lecon = Lecon::findOrFail($lecon_id);
        $notes = Note::where('lecon_id', $lecon_id)->get();
        $moyenne = $notes->avg('valeur');

        return view('note.index', compact('lecon', 'notes', 'moyenne'));
    }
}
