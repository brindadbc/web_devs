<?php

namespace App\Http\Controllers;

use App\Models\Chapitre;
use App\Models\Cour;
use App\Models\Lecon;
use App\Models\Video;
use Illuminate\Http\Request;

class LeconController extends Controller
{
  
    public function create(Cour $cours)
    {
        return view('lecon.create', compact('cours'));
    }
    

    

    // public function create($chapitre_id)
    // {
    //     $chapitre = Chapitre::findOrFail($chapitre_id);
    //     return view('lecon.create', compact('chapitre'));
    // }

    // public function store(Request $request, Chapitre $chapitre)
    // {
    //     $request->validate([
    //                 'chapitre_id' => 'required|exists:chapitres,id',
    //                 'titre' => 'required|string|max:255',
    //                 'contenu' => 'nullable|string',
    //                 'videos.*.titre' => 'required|string|max:255',
    //                 'videos.*.video_url' => 'required|url',
    //             ]);
            
    //             $lecon = Lecon::create([
    //                 'chapitre_id' => $request->chapitre_id,
    //                 'titre' => $request->titre,
    //                 'contenu' => $request->contenu,
    //             ]);
            
    //             if ($request->has('videos')) {
    //                 foreach ($request->videos as $videoData) {
    //                     Video::create([
    //                         'lecon_id' => $lecon->id,
    //                         'titre' => $videoData['titre'],
    //                         'video_url' => $videoData['video_url'],
    //                     ]);
    //                 }
    //             }
    
    //     return redirect()->route('lecon.show', $chapitre->id)->with('success', 'Leçon ajoutée avec succès.');
    // }
    
    public function store(Request $request, cour $cours)
{
    $request->validate([
        'cour_id' => 'required|exists:cours,id',
        'titre' => 'required|string|max:255',
        'contenu' => 'nullable|string',
        'videos.*.titre' => 'required|string|max:255',
        'videos.*.video_url' => 'required|url',
    ]);

    $lecon = Lecon::create([
        'cour_id' => $request->cours_id,
        'titre' => $request->titre,
        'contenu' => $request->contenu,
    ]);

    if ($request->has('videos')) {
        foreach ($request->videos as $videoData) {
            Video::create([
                'lecon_id' => $lecon->id,
                'titre' => $videoData['titre'],
                'video_url' => $videoData['video_url'],
            ]);
        }
    }

    return redirect()->route('cour.show')->with('success', 'Leçon et vidéos créées avec succès.');
   
   
}

    public function edit(Lecon $lecon)
    {
        return view('lecon.edit', compact('lecons'));
    }
    public function update(Request $request, Cour $cours, Lecon $lecon)
{
    $request->validate([
                'titre' => 'required|string|max:255',
                'contenu' => 'nullable|string',
                'video_url' => 'required|url',
            ]);
    
            $lecon->update([
                'titre' => $request->titre,
                'contenu' => $request->contenu,
                'video_url' => $request->video_url,
            ]);

    return redirect()->route('cour.show', $cours->id)->with('success', 'Leçon mise à jour.');
}


    // public function update(Request $request, Lecon $lecon)
    // {
    //     $request->validate([
    //         'titre' => 'required|string|max:255',
    //         'contenu' => 'nullable|string',
    //         'video_url' => 'required|url',
    //     ]);

    //     $lecon->update([
    //         'titre' => $request->titre,
    //         'contenu' => $request->contenu,
    //         'video_url' => $request->video_url,
    //     ]);

    //     return redirect()->route('lecon.edit', $lecon->chapitre_id)->with('success', 'Leçon modifiée avec succès.');
    // }

    public function destroy(Cour $cours, Lecon $lecon)
    {
        $lecon->delete();
        return redirect()->route('cour.show', $cours->id)->with('success', 'Leçon supprimée.');
    }
    

    public function show($id)
    {
        
        $cours = Cour::with('lecons')->findOrFail($id);
    // $lecon = Lecon::findOrFail($id);
    $lecon = $cours->lecon; 

$video = video:: findorfail($id);
    // Récupérer les autres vidéos du même cours
    $relatedVideos = Lecon::where('cour_id', $lecon->cour_id)
                        ->where('id', '!=', $lecon->id)
                        ->latest()
                        ->limit(6)
                        ->get();

    return view('cour.show', compact('cours','lecons', 'relatedVideos', 'video'));
}











    /**
     * Display a listing of the resource.
     */
    // public function index($chapitre_id)
    // {
    //     $chapitre = Chapitre::findOrFail($chapitre_id);
    //     $lecon = $chapitre->lecon;
    //     return view('lecon.index', compact('lecon', 'chapitre'));
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create($chapitre_id)
    // {
    //     return view('lecon.create', compact('chapitre_id'));
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request,$chapitre_id)
    // {
    //     $request->validate([
    //         'titre' => 'required|string|max:255',
    //         'video_url' => 'required|url',
    //         'contenu' => 'required|string',
    //     ]);
    //     Lecon::create(['titre' => $request->titre,'contenu' => $request->contenu, 'video_url' => $request->video_url, 'chapitre_id' => $chapitre_id]);
    //     return redirect()->route('lecon.index', $chapitre_id);
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     $lecon = Lecon::findOrFail($id);
    //     return view('lecon.show', compact('lecon'));
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     $lecon = Lecon::findOrFail($id);
    //     return view('lecon.edit', compact('lecon'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     $request->validate(['titre' => 'required|string|max:255', 'video_url' => 'required|url','contenu' => 'required|string',]);
    //     $lecon = Lecon::findOrFail($id);
    //     $lecon->update(['titre' => $request->titre,'contenu' => $request->contenu, 'video_url' => $request->video_url]);
    //     return redirect()->route('lecon.index', $lecon->chapitre_id);
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(string $id)
    // {
    //     $lecon = Lecon::findOrFail($id);
    //     $lecon->delete();
    //     return redirect()->route('lecon.index', $lecon->chapitre_id);
    // }
}
