<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use App\Models\Courses;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // public function index()
    // {
    //     return view('admin.dashboard');
    // }
    public function indexs()
    {
        $users = User::all();
        return view('admin.indexs', compact('users'));
    }

    public function index()
    {
        $totalUsers = User::count();
        $totalCours = Courses::count();
        $newUsers = User::where('created_at', '>=', Carbon::now()->subMonth())->count();
        
        $usersByMonth = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                            ->groupBy('month')
                            ->pluck('count', 'month');

        return view('admin.dashboard', compact('totalUsers', 'totalCours', 'newUsers', 'usersByMonth'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'categorie_id' => 'required|exists:categories,id',
            'teacher_id' => 'required|exists:users,id',
        ]);
        Courses::create([
            'titre' => $request->titre,
            'categorie_id' => $request->categorie_id,
            'teacher_id' => $request->teacher_id,
        ]);
        return redirect()->route('admin.dashboard')->with('success', 'Cours ajouté avec succès !');
    }
    public function edit(User $user)
    {
        return view('admin.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:admin,teacher,student',
        ]);

        $user->role = $request->role;
        $user->save();

        return redirect()->route('admin.indexs')->with('success', 'Utilisateur mis à jour.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.indexs')->with('success', 'Utilisateur supprimé.');
    }
}
