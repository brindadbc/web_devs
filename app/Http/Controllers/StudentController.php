<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cour;
use App\Models\Courses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    // public function cour()
    // {
    //     // Récupérer les cours suivis par l'étudiant connecté
    //  $cour  = Auth::user()->cour;
    //     return view('student.cour', compact('cours'));
    // }
    // public function home() {
    //     return view('student.home');
    // }

    // // public function courses() {
    // //     return view('student.cour');
    // // }

    // public function lecon($id) {
    //     return view('student.lecon', ['id' => $id]);
    // }

    // public function message() {
    //     return view('student.message');
    // }

    // public function favorie() {
    //     return view('student.favorie');
    // }

    // public function index()
    // {
    //     return view('student.dashboard');
    // }
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
        }
       
        $student = Auth::user(); // Récupérer l'étudiant connecté
        $categories = Category::withCount('courses')->paginate(10);
        $courses = Courses::all(); 
        // $coursSuivis = $student->coursSuivis()->get(); 
        return view('student.dashboard', compact('courses'));
    }
}

