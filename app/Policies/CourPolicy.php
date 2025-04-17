<?php

namespace App\Policies;

use App\Models\Cour;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CourPolicy
{
//     /**
//      * Determine whether the user can view any models.
//      */
//     public function viewAny(User $user): bool
//     {
//         return true;
//     }

//     /**
//      * Determine whether the user can view the model.
//      */
//     public function view(User $user, Cour $cour): bool
//     {
//         // return in_array($user->role, ['enseignant', 'admin', 'etudiant']);
//     }

//     /**
//      * Determine whether the user can create models.
//      */
//     public function create(User $user): bool
//     {
//         // return in_array($user->role, ['enseignant', 'admin']);
//     }

//     /**
//      * Determine whether the user can update the model.
//      */
//     public function update(User $user, cour $cour): bool
//     {
//         // return $user->id === $cour->user_id || $user->role === 'admin';
//         // return $user->role === 'enseignant' || $user->role === 'admin';
//     }

//     /**
//      * Determine whether the user can delete the model.
//      */
//     public function delete(User $user, cour $cour): bool
//     {
//         // return $user->id === $cour->user_id || $user->role === 'admin';
//     }

//     /**
//      * Determine whether the user can restore the model.
//      */
//     public function restore(User $user, cour $cour): bool
//     {
//         // return $user->role == "admin";
//     }
//     /**
//      * Determine whether the user can permanently delete the model.
//      */
//     public function forceDelete(User $user, cour $cour): bool
//     {
//         // return $user->role == "admin";
      
// }
}