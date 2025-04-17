<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Cour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategorieController extends Controller
{
    // public function __construct(){
       
    //     $this->middleware(["auth", "verified"])->except(["show", "index"]);

    //     // $this->authorizeResource(Cour::class, 'cour');
      
        
    // }


    // public function index()
    // {
        
    //     return view('categorie.index', compact('categories'));
    // }

    // public function create()
    // {
    //     return view('categorie.create');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'titre' => 'required|string|max:255',
    //         // 'description' => 'required|string',
    //     ]);

    //     Categorie::create([
    //         'titre' => $request->titre,
    //         // 'description' => $request->description,
    //     ]);

    //     return redirect()->route('categorie.index')->with('success', 'Catégorie créée!');
    // }
    // public function show(Categorie $categorie)
    // {
    //     return view("categorie.show", [
    //         "categorie" => $categorie
    //     ]);
    // }

    // public function edit($id)
    // {
    //     $categorie = Categorie::findOrFail($id);
    //     return view('categorie.edit', compact('categorie'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'titre' => 'required|string|max:255',
    //         // 'description' => 'required|string',
    //     ]);

    //     $categorie = Categorie::findOrFail($id);
    //     $categorie->update([
    //         'titre' => $request->titre,
    //         // 'description' => $request->description,
    //     ]);

    //     return redirect()->route('categorie.index')->with('success', 'Catégorie mise à jour!');
    // }

    // public function destroy($id)
    // {
    //     Categorie::destroy($id);
    //     return redirect()->route('categorie.index')->with('success', 'Catégorie supprimée!');
    // }





   




    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     //return Categorie::all();
        
    //     return view("categorie.index", [
    //         "categories" => Categorie::orderBy('created_at', 'desc')->paginate(6)
    //     ]);
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     return view('categorie.create');
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     $titre = $request->input('titre');

    //     Categorie::create([
    //         "titre" => $titre
    //     ]);

    //     return redirect()->route("categorie.index")->with("success", "Votre Categorie a bien été crée !");

    //     // $request->validate([
    //     //     'titre' => 'required|string|max:255|unique:categorie,titre'
    //     // ]);

    //     // Categorie::create(['titre' => $request->titre]);

    //     // return redirect()->route('categorie.index')->with('success', 'Catégorie ajoutée avec succès.');

    // }
    

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Categorie $categorie)
    // {
    //     return view("categorie.show", [
    //         "categorie" => $categorie
    //     ]);
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Categorie $categorie)
    // {
    //     return view("categorie.edit", [
    //         "categorie" => $categorie
    //     ]);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Categorie $categorie)
    // {
    //     // $request->validate([
    //     //     'titre' => 'required|string|max:255|unique:categorie,titre,' . $categorie->id
    //     // ]);

    //     // $categorie->update(['titre' => $request->titre]);
    //     $titre = $request->input('titre');
    //     $validator= Validator::make([
    //      "titre" => $titre
    //     ],
    //     [
    //      "titre" => ["required", "min:4", "max:50"],
    //  ]);
 
    //      $datas = $validator->validated();
 
 
 
 
    //      $categorie->update($datas);
 

    //     return redirect()->route('categorie.index')->with('success', 'Catégorie mise à jour avec succès.');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy($id )
    // {
        
    //     $categorie = Categorie::findOrFail($id);
    //     // if ($categorie->cour()) {
    //     //     return redirect()->route('categorie.index')->with('error', 'Impossible de supprimer cette catégorie car elle contient des cours.');
    //     // }
    
    //     $categorie->delete();
    
    //     return redirect()->route('categorie.index')->with('success', 'Catégorie supprimée avec succès.');
    // }
}
