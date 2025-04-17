<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use App\Models\Courses;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    // public function dashboard() {
    //     return view('teacher.dashboard');
    // }

    // public function cour() {
    //     // return view('teacher.cour');
    //     $cours = Cour::where('teacher_id', Auth::id())->get();

    //     return view('teacher.cour', compact('cours'));

       
    // }

    // public function createCour() {
    //     return view('teacher.create_cour');
    // }

    // public function storeCour(Request $request) {
    //     // Enregistrement du cours
    // }

    // public function message() {
    //     return view('teacher.message');
    // }


    // public function index()
    // {
    //     // $cours = Cour::all(); // Récupère tous les cours
       
    // return view('teacher.dashboard', compact('cours',));
        
    // }
    public function index()
{
    

    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
    }

    // Récupérer l'enseignant connecté
    $teacher = Auth::user();
   
    // $course = Courses::where('teacher_id', $teacher->id)->get();

    // $nombreStudent = User::whereHas('courses', function ($query) use ($teacher) {
    //     $query->where('teacher_id', $teacher->id);
    // })->count();

    // Nombre de messages reçus par cet enseignant
    // $nombreMessage = Message::where('recepteur_id', $teacher->id)->count();
   
 
    return view('teacher.dashboard');
  
}

}