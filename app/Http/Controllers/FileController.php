<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\File;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function store(Request $request, Conversation $conversation)
    {
        // Vérifier si l'utilisateur fait partie de la conversation
        if (!$conversation->users->contains(Auth::id())) {
            abort(403);
        }

        $validated = $request->validate([
            'file' => 'required|file|max:10240', // Max 10MB
        ]);

        // Créer un message contenant le fichier
        $message = Message::create([
            'conversation_id' => $conversation->id,
            'user_id' => Auth::id(),
            'content' => 'A partagé un fichier: ' . $request->file('file')->getClientOriginalName(),
            'read' => false,
        ]);

        // Stocker le fichier
        $path = $request->file('file')->store('chat_files');
        
        // Créer l'entrée de fichier
        $file = File::create([
            'message_id' => $message->id,
            'name' => $request->file('file')->getClientOriginalName(),
            'type' => $request->file('file')->getClientMimeType(),
            'size' => $request->file('file')->getSize(),
            'path' => $path,
        ]);

        // Mettre à jour la date du dernier message
        $conversation->update(['last_message_at' => now()]);

        return back()->with('success', 'Fichier envoyé avec succès');
    }

    public function download(File $file)
    {
        // Vérifier si l'utilisateur a accès au fichier
        $message = $file->message;
        $conversation = $message->conversation;

        if (!$conversation->users->contains(Auth::id())) {
            abort(403);
        }

        return Storage::download($file->path, $file->name);
    }
}
